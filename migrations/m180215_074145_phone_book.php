<?php

use yii\db\Migration;

/**
 * Class m180215_074145_phone_book
 */
class m180215_074145_phone_book extends Migration {
    const TABLE_NAME = '{{%phone_book}}';

    public function up() {
        $this->createTable(static::TABLE_NAME, [
            'id' => $this->primaryKey(11),
            'name' => $this->string(100)->notNull(),
            'phone' => $this->string(20)->notNull()->unique(),
        ]);
    }

    public function down() {
        $this->dropTable(static::TABLE_NAME);
    }

}
