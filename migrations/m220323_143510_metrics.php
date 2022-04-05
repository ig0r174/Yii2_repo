<?php

use yii\db\Migration;

/**
 * Class m220323_143510_metrics
 */
class m220323_143510_metrics extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%metrics}}', [
            'id' => $this->primaryKey(),
            'date_create' => $this->timestamp(),
            'source_id' => $this->integer(),
            'counter_id' => $this->integer(),
            'value' => $this->float()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metrics}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220323_143510_metrics cannot be reverted.\n";

        return false;
    }
    */
}
