<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m220703_084744_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'email' => $this->string(128)->notNull()->unique(),
            'telephone' => $this->text(10)->notNull(),
            'route' => $this->string(128)->notNull(),
            'joined_date' => $this->date()->notNull(),
            'comment' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team}}');
    }
}
