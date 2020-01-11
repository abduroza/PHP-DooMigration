<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catering_category}}`.
 */
class m200111_075755_create_catering_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catering_category}}', [
            'id' => $this->primaryKey(),
            'catering_category' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catering_category}}');
    }
}
