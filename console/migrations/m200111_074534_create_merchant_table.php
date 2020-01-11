<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%merchant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m200111_074534_create_merchant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%merchant}}', [
            'id' => $this->primaryKey(),
            'shop_name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->text()->notNull(),
            'profil_image' => $this->string(),
            'id_user' => $this->integer(),
            'list_id_product' => $this->integer(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-merchant-id_user}}',
            '{{%merchant}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-merchant-id_user}}',
            '{{%merchant}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // // creates index for column `list_id_product`
        // $this->createIndex(
        //     '{{%idx-merchant-list_id_product}}',
        //     '{{%merchant}}',
        //     'list_id_product'
        // );

        // // add foreign key for table `{{%product}}`
        // $this->addForeignKey(
        //     '{{%fk-merchant-list_id_product}}',
        //     '{{%merchant}}',
        //     'list_id_product',
        //     '{{%product}}',
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
            '{{%fk-merchant-id_user}}',
            '{{%merchant}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-merchant-id_user}}',
            '{{%merchant}}'
        );

        // // drops foreign key for table `{{%product}}`
        // $this->dropForeignKey(
        //     '{{%fk-merchant-list_id_product}}',
        //     '{{%merchant}}'
        // );

        // // drops index for column `list_id_product`
        // $this->dropIndex(
        //     '{{%idx-merchant-list_id_product}}',
        //     '{{%merchant}}'
        // );

        $this->dropTable('{{%merchant}}');
    }
}
