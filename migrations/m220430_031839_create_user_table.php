<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220430_031839_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
            'status' => $this->tinyInteger(),
        ]);
        /**
         * Insert Default Admin User
         * Login: admin
         * Pass: admin
         */
        $this->insert('users', [
            'id' => 1,
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => '',
            'accessToken' => '',
            'status' => 1,
//            'created_at' => 1505282484,
//            'updated_at' => 1505282484,
//            'created_by' => 1,
//            'updated_by' => 1
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
