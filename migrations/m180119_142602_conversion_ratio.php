<?php

use yii\db\Migration;

/**
 * Class m180119_142602_conversion_ratio
 */
class m180119_142602_conversion_ratio extends Migration
{
    public function up()
    {
        $this->createTable('conversion_ratio', [
            'id' => $this->primaryKey(),
            'from' => $this->integer()->notNull(),
            'to' => $this->integer()->notNull(),
            'ratio' => $this->double()
        ]);

        $this->addForeignKey(
            'fk_from_currency',
            'conversion_ratio',
            'from',
            'currency',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_to_currency',
            'conversion_ratio',
            'to',
            'currency',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk_from_currency',
            'conversion_ration'
        );

        $this->dropForeignKey(
            'fk_to_currency',
            'conversion_ration'
        );

        $this->dropTable('conversion_ratio');
    }
}
