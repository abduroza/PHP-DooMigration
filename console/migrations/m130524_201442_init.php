<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'user_role' => "ENUM('admin', 'merchant', 'customer')",
            'id_customer' => $this->integer(),
            'id_merchant' => $this->integer(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        // // creates index for column `id_customer`
        // $this->createIndex(
        //     '{{%idx-user-id_customer}}',
        //     '{{%user}}',
        //     'id_customer'
        // );

        // // add foreign key for table `{{%customer}}`
        // $this->addForeignKey(
        //     '{{%fk-user-id_customer}}',
        //     '{{%user}}',
        //     'id_customer',
        //     '{{%customer}}',
        //     'id',
        //     'CASCADE'
        // );

        // // creates index for column `id_merchant`
        // $this->createIndex(
        //     '{{%idx-user-id_merchant}}',
        //     '{{%user}}',
        //     'id_merchant'
        // );

        // // add foreign key for table `{{%merchant}}`
        // $this->addForeignKey(
        //     '{{%fk-user-id_merchant}}',
        //     '{{%user}}',
        //     'id_merchant',
        //     '{{%merchant}}',
        //     'id',
        //     'CASCADE'
        // );
    }

    public function down()
    {
        // // drops foreign key for table `{{%customer}}`
        // $this->dropForeignKey(
        //     '{{%fk-user-id_customer}}',
        //     '{{%user}}'
        // );

        // // drops index for column `id_customer`
        // $this->dropIndex(
        //     '{{%idx-user-id_customer}}',
        //     '{{%user}}'
        // );
        // // drops foreign key for table `{{%merchant}}`
        // $this->dropForeignKey(
        //     '{{%fk-user-id_merchant}}',
        //     '{{%user}}'
        // );

        // // drops index for column `id_merchant`
        // $this->dropIndex(
        //     '{{%idx-user-id_merchant}}',
        //     '{{%user}}'
        // );
        $this->dropTable('{{%user}}');
    }
}
