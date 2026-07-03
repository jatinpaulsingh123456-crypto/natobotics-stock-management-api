<?php

namespace app\controllers;

use Yii;
use app\models\StockItem;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;

class StockItemController extends ActiveController
{
    public $modelClass = StockItem::class;

    public function actions()
    {
        $actions = parent::actions();

        // Use custom index action
        unset($actions['index']);

        return $actions;
    }

    /**
     * List Stock Items
     * Supports:
     * GET /stock-items
     * GET /stock-items?category=1
     * GET /stock-items?search=arduino
     */
    public function actionIndex()
    {
        $query = StockItem::find();

        $category = Yii::$app->request->get('category');
        $search = Yii::$app->request->get('search');

        if (!empty($category)) {
            $query->andWhere(['category_id' => $category]);
        }

        if (!empty($search)) {
            $query->andWhere([
                'or',
                ['like', 'name', $search],
                ['like', 'sku', $search],
            ]);
        }

        return [
            'success' => true,
            'count' => $query->count(),
            'data' => $query->all(),
        ];
    }

    /**
     * Increase Stock Quantity
     */
    public function actionStockIn($id)
    {
        $item = StockItem::findOne($id);

        if ($item === null) {
            throw new NotFoundHttpException('Stock item not found.');
        }

        $body = Yii::$app->request->bodyParams;

        if (!isset($body['quantity'])) {
            throw new BadRequestHttpException('Quantity is required.');
        }

        $quantity = (int)$body['quantity'];

        if ($quantity <= 0) {
            throw new BadRequestHttpException('Quantity must be greater than zero.');
        }

        $item->quantity += $quantity;

        if (!$item->save()) {
            return [
                'success' => false,
                'message' => 'Failed to update stock.',
                'errors' => $item->getErrors(),
            ];
        }

        return [
            'success' => true,
            'message' => 'Stock added successfully.',
            'data' => [
                'id' => $item->id,
                'name' => $item->name,
                'sku' => $item->sku,
                'quantity' => $item->quantity,
                'reorder_level' => $item->reorder_level,
            ],
        ];
    }

    /**
     * Decrease Stock Quantity
     */
    public function actionStockOut($id)
    {
        $item = StockItem::findOne($id);

        if ($item === null) {
            throw new NotFoundHttpException('Stock item not found.');
        }

        $body = Yii::$app->request->bodyParams;

        if (!isset($body['quantity'])) {
            throw new BadRequestHttpException('Quantity is required.');
        }

        $quantity = (int)$body['quantity'];

        if ($quantity <= 0) {
            throw new BadRequestHttpException('Quantity must be greater than zero.');
        }

        if ($item->quantity < $quantity) {
            throw new BadRequestHttpException(
                'Insufficient stock. Available quantity: ' . $item->quantity
            );
        }

        $item->quantity -= $quantity;

        if (!$item->save()) {
            return [
                'success' => false,
                'message' => 'Failed to update stock.',
                'errors' => $item->getErrors(),
            ];
        }

        return [
            'success' => true,
            'message' => 'Stock removed successfully.',
            'data' => [
                'id' => $item->id,
                'name' => $item->name,
                'sku' => $item->sku,
                'quantity' => $item->quantity,
                'reorder_level' => $item->reorder_level,
            ],
        ];
    }

    /**
     * Get Low Stock Items
     */
    public function actionLowStock()
    {
        $items = StockItem::find()
            ->where('quantity <= reorder_level')
            ->all();

        return [
            'success' => true,
            'count' => count($items),
            'data' => $items,
        ];
    }
}