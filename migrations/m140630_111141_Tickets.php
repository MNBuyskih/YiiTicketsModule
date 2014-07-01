<?php

class m140630_111141_Tickets extends CDbMigration {

    public function up() {
        $this->createTable('tickets', array(
            'id'          => 'pk',
            'category_id' => 'string NOT NULL',
            'title'       => 'string NOT NULL',
            'message'     => 'text NOT NULL',
            'user_id'     => 'integer NOT NULL',
            'create'      => 'datetime NOT NULL',
            'state'       => 'integer NOT NULL',
        ));
    }

    public function down() {
        $this->dropTable('tickets');
    }

}