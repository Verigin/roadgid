<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shorturl}}`.
 */
class m220714_100946_create_shorturl_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shorturl}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'shorturl' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shorturl}}');
    }
}
