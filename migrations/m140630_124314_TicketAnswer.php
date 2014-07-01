<?php

class m140630_124314_TicketAnswer extends CDbMigration {

    public function up() {
        $this->createTable('ticket_answers',
            array(
                'id'        => 'pk',
                'message'   => 'text NOT NULL',
                'ticket_id' => 'integer NOT NULL',
                'user_id'   => 'integer NOT NULL',
                'create'    => 'datetime NOT NULL'
            ));
    }

    public function down() {
        $this->dropTable('ticket_answers');
    }

}