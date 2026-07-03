<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m260702_154052_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->createTable('{{%category}}', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'description' => $this->text(),
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
