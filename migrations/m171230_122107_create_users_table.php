<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171230_122107_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'password_reset_token' => $this->string()->null(),
            'accessToken' => $this->string()->null(),
            'auth_key' => $this->string()->null(),
            'username' => $this->string()->unique(),
            'email' => $this->string()->unique(),
            'password' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
