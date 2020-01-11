<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200111_064338_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string()->notNull(),
            'birth_date' => $this->dateTime(),
            'address' => $this->text()->notNull(),
            'gender' => "ENUM('male', 'female')",
            'profil_image' => $this->string(),
            'id_user' => $this->integer(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-customer-id_user}}',
            '{{%customer}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-customer-id_user}}',
            '{{%customer}}',
            'id_user',
            '{{%user}}',
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
            '{{%fk-customer-id_user}}',
            '{{%customer}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-customer-id_user}}',
            '{{%customer}}'
        );

        $this->dropTable('{{%customer}}');
    }
}
