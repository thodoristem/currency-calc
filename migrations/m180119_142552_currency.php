<?php

use yii\db\Migration;

/**
 * Class m180119_142552_currency
 */
class m180119_142552_currency extends Migration
{
    public function up()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'code' => $this->string(3)->notNull()->unique()
        ]);

        $this->createIndex(
            'idx_currency_code',
            'currency',
            'code'
        );
    }

    public function down()
    {
        $this->dropIndex(
            'idx_currency_code',
            'currency'
        );

        $this->dropTable('currency');
    }
}
