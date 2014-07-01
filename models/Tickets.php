<?php
/**
 * Tickets.php
 * Date: 30.06.14
 * Time: 14:16
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class Tickets
 *
 * @property TicketAnswers $answers
 */
class Tickets extends TicketsBase {

    /**
     * @param string $className
     *
     * @return Tickets
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'id'          => 'Id',
            'category_id' => 'Отдел',
            'title'       => 'Тема запроса',
            'message'     => 'Message',
            'user_id'     => 'User',
            'create'      => 'Дата',
            'state'       => 'Статус',
        );
    }

    public function relations() {
        return array(
            'answers' => array(
                self::HAS_MANY,
                'TicketAnswers',
                'ticket_id'
            )
        );
    }

    public static function categories($category = null) {
        $categories = Yii::app()->getModule('tickets')->categories;

        return $category !== null ? isset($categories[$category]) ? $categories[$category] : null : $categories;
    }

    public static function states($state = null) {
        $states = Yii::app()->getModule('tickets')->states;

        return $state !== null ? isset($states[$state]) ? $states[$state] : null : $states;
    }

    protected function beforeValidate() {
        if ($this->scenario == 'insert') {
            /** @var TicketsModule $module */
            $module = Yii::app()->getModule('tickets');

            $this->user_id = $module->getUserId();
            $this->create  = date('Y-m-d H:i:s');
            $this->state   = $module->defaultState;
        }

        return parent::beforeValidate();
    }

}