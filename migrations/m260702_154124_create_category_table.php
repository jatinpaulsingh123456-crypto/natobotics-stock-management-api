<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m260702_154124_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->createTable('{{%stock_item}}', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'sku' => $this->string()->notNull()->unique(),
        'category_id' => $this->integer()->notNull(),
        'quantity' => $this->integer()->defaultValue(0),
        'unit_price' => $this->decimal(10,2)->defaultValue(0),
        'reorder_level' => $this->integer()->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);

    $this->addForeignKey(
        'fk-stock-category',
        'stock_item',
        'category_id',
        'category',
        'id',
        'CASCADE',
        'CASCADE'
    );
    }

public function safeDown()
    {
    $this->dropForeignKey('fk-stock-category', 'stock_item');
    $this->dropTable('{{%stock_item}}');
    }
}
