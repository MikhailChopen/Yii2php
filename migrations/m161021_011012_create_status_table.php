<?php

use yii\db\Migration;

/**
 * Handles the creation for table `status`.
 */
class m161021_011012_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status');
    }
}
