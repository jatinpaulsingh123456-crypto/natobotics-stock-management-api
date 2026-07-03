<?php

namespace app\models;

use yii\db\ActiveRecord;

class StockItem extends ActiveRecord
{
    public static function tableName()
    {
        return 'stock_item';
    }

    public function rules()
    {
        return [
            [['name', 'sku', 'category_id'], 'required'],
            [['category_id', 'quantity', 'reorder_level'], 'integer', 'min' => 0],
            [['unit_price'], 'number', 'min' => 0],
            [['sku'], 'unique'],
            [['description'], 'safe'],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}