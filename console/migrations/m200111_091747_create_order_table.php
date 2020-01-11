<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%cart}}`
 */
class m200111_091747_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'order_date' => $this->dateTime(),
            'total_price' => $this->integer()->defaultValue(0),
            'total_weight' => $this->integer()->defaultValue(0),
            'is_done' => $this->boolean()->defaultValue(0),
            'id_user' => $this->integer(),
            'list_id_cart' => $this->integer(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-order-id_user}}',
            '{{%order}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order-id_user}}',
            '{{%order}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `list_id_cart`
        $this->createIndex(
            '{{%idx-order-list_id_cart}}',
            '{{%order}}',
            'list_id_cart'
        );

        // add foreign key for table `{{%cart}}`
        $this->addForeignKey(
            '{{%fk-order-list_id_cart}}',
            '{{%order}}',
            'list_id_cart',
            '{{%cart}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order-id_user}}',
            '{{%order}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-order-id_user}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%cart}}`
        $this->dropForeignKey(
            '{{%fk-order-list_id_cart}}',
            '{{%order}}'
        );

        // drops index for column `list_id_cart`
        $this->dropIndex(
            '{{%idx-order-list_id_cart}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
