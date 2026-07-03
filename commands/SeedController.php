<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Category;
use app\models\StockItem;

class SeedController extends Controller
{
    public function actionIndex()
    {
        // Clear existing data
        StockItem::deleteAll();
        Category::deleteAll();

        // Categories
        $categories = [
            ['Electronics', 'Electronic devices'],
            ['Networking', 'Networking equipment'],
            ['Robotics', 'Robotics components'],
            ['Tools', 'Hand tools'],
            ['Mechanical', 'Mechanical parts'],
        ];

        $categoryIds = [];

        foreach ($categories as $category) {
            $model = new Category();
            $model->name = $category[0];
            $model->description = $category[1];
            $model->save();

            $categoryIds[] = $model->id;
        }

        // Stock Items
        $items = [
            ['Arduino Uno', 'SKU001', 0, 100, 499, 10],
            ['ESP32', 'SKU002', 0, 50, 699, 10],
            ['Raspberry Pi', 'SKU003', 0, 25, 4500, 5],
            ['Router', 'SKU004', 1, 20, 1800, 5],
            ['Switch', 'SKU005', 1, 30, 1500, 10],
            ['Ethernet Cable', 'SKU006', 1, 200, 250, 20],
            ['Servo Motor', 'SKU007', 2, 60, 350, 10],
            ['Ultrasonic Sensor', 'SKU008', 2, 75, 180, 15],
            ['Motor Driver', 'SKU009', 2, 40, 300, 10],
            ['Screwdriver Set', 'SKU010', 3, 80, 450, 20],
            ['Multimeter', 'SKU011', 3, 25, 900, 5],
            ['Pliers', 'SKU012', 3, 50, 300, 10],
            ['Bearing', 'SKU013', 4, 120, 100, 20],
            ['Gear', 'SKU014', 4, 70, 250, 15],
            ['Coupling', 'SKU015', 4, 40, 400, 10],
        ];

        foreach ($items as $item) {
            $stock = new StockItem();
            $stock->name = $item[0];
            $stock->sku = $item[1];
            $stock->category_id = $categoryIds[$item[2]];
            $stock->quantity = $item[3];
            $stock->unit_price = $item[4];
            $stock->reorder_level = $item[5];
            $stock->save();
        }

        echo "Seed data inserted successfully.\n";
    }
}