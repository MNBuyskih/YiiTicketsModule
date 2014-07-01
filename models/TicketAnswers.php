<?php
/**
 * TicketAnswers.php
 * Date: 30.06.14
 * Time: 15:47
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class TicketAnswers
 *
 * @property Tickets $ticket;
 */
class TicketAnswers extends TicketAnswersBase {

    /**
     * @param string $className
     *
     * @return TicketAnswers
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function relations() {
        return array(
            'ticket' => array(
                self::BELONGS_TO,
                'Tickets',
                'ticket_id',
            )
        );
    }

    public function attributeLabels() {
        return array(
            'id'        => 'ID',
            'message'   => 'Написать ответ',
            'ticket_id' => 'Ticket',
            'user_id'   => 'User',
            'create'    => 'Create',
        );
    }

    protected function beforeValidate() {
        if ($this->scenario == 'insert') {
            /** @var TicketsModule $module */
            $module        = Yii::app()->getModule('tickets');
            $this->user_id = $module->getAnswerUserId($this->ticket);
            $this->create  = date('Y-m-d H:i:s');
        }

        return parent::beforeValidate();
    }

}