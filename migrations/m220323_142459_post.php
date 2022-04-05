<?php

use yii\db\Migration;

/**
 * Class m220323_142459_post
 */
class m220323_142459_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'body' => $this->string(4096),
            'head' => $this->string(),
            'dateCreate' => $this->dateTime(),
            'author' => $this->integer(),
            'status' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220323_142459_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220323_142459_post cannot be reverted.\n";

        return false;
    }
    */
}
