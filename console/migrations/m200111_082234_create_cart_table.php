<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m200111_082234_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'to_cart_date' => $this->dateTime(),
            'quantity' => $this->integer()->defaultValue(1),
            'sub_total' => $this->integer()->defaultValue(0),
            'sub_weight' => $this->integer()->defaultValue(0),
            'id_user' => $this->integer(),
            'id_product' => $this->integer(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-cart-id_user}}',
            '{{%cart}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-cart-id_user}}',
            '{{%cart}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_product`
        $this->createIndex(
            '{{%idx-cart-id_product}}',
            '{{%cart}}',
            'id_product'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-cart-id_product}}',
            '{{%cart}}',
            'id_product',
            '{{%product}}',
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
            '{{%fk-cart-id_user}}',
            '{{%cart}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-cart-id_user}}',
            '{{%cart}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-cart-id_product}}',
            '{{%cart}}'
        );

        // drops index for column `id_product`
        $this->dropIndex(
            '{{%idx-cart-id_product}}',
            '{{%cart}}'
        );

        $this->dropTable('{{%cart}}');
    }
}
