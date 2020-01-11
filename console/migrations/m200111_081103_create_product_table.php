<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%merchant}}`
 * - `{{%product_category}}`
 * - `{{%catering_category}}`
 * - `{{%order}}`
 */
class m200111_081103_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'quota' => $this->integer(),
            'description' => $this->string(),
            'list_image' => $this->string(),
            'price' => $this->integer()->notNull(),
            'weight' => $this->integer(),
            'date_create' => $this->dateTime(),
            'id_user' => $this->integer(),
            'id_merchant' => $this->integer(),
            'id_product_category' => $this->integer(),
            'id_catering_category' => $this->integer(),
            'list_id_order' => $this->integer(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-product-id_user}}',
            '{{%product}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-product-id_user}}',
            '{{%product}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_merchant`
        $this->createIndex(
            '{{%idx-product-id_merchant}}',
            '{{%product}}',
            'id_merchant'
        );

        // add foreign key for table `{{%merchant}}`
        $this->addForeignKey(
            '{{%fk-product-id_merchant}}',
            '{{%product}}',
            'id_merchant',
            '{{%merchant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_product_category`
        $this->createIndex(
            '{{%idx-product-id_product_category}}',
            '{{%product}}',
            'id_product_category'
        );

        // add foreign key for table `{{%product_category}}`
        $this->addForeignKey(
            '{{%fk-product-id_product_category}}',
            '{{%product}}',
            'id_product_category',
            '{{%product_category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_catering_category`
        $this->createIndex(
            '{{%idx-product-id_catering_category}}',
            '{{%product}}',
            'id_catering_category'
        );

        // add foreign key for table `{{%catering_category}}`
        $this->addForeignKey(
            '{{%fk-product-id_catering_category}}',
            '{{%product}}',
            'id_catering_category',
            '{{%catering_category}}',
            'id',
            'CASCADE'
        );

        // // creates index for column `list_id_order`
        // $this->createIndex(
        //     '{{%idx-product-list_id_order}}',
        //     '{{%product}}',
        //     'list_id_order'
        // );

        // // add foreign key for table `{{%order}}`
        // $this->addForeignKey(
        //     '{{%fk-product-list_id_order}}',
        //     '{{%product}}',
        //     'list_id_order',
        //     '{{%order}}',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-product-id_user}}',
            '{{%product}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-product-id_user}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%merchant}}`
        $this->dropForeignKey(
            '{{%fk-product-id_merchant}}',
            '{{%product}}'
        );

        // drops index for column `id_merchant`
        $this->dropIndex(
            '{{%idx-product-id_merchant}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%product_category}}`
        $this->dropForeignKey(
            '{{%fk-product-id_product_category}}',
            '{{%product}}'
        );

        // drops index for column `id_product_category`
        $this->dropIndex(
            '{{%idx-product-id_product_category}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%catering_category}}`
        $this->dropForeignKey(
            '{{%fk-product-id_catering_category}}',
            '{{%product}}'
        );

        // drops index for column `id_catering_category`
        $this->dropIndex(
            '{{%idx-product-id_catering_category}}',
            '{{%product}}'
        );

        // // drops foreign key for table `{{%order}}`
        // $this->dropForeignKey(
        //     '{{%fk-product-list_id_order}}',
        //     '{{%product}}'
        // );

        // // drops index for column `list_id_order`
        // $this->dropIndex(
        //     '{{%idx-product-list_id_order}}',
        //     '{{%product}}'
        // );

        $this->dropTable('{{%product}}');
    }
}
