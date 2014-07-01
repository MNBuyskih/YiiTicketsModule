<?php
/**
 * TicketsModule.php
 * Date: 30.06.14
 * Time: 14:04
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class TicketsModule
 *
 * @property int $userId;
 */
class TicketsModule extends CWebModule {

    /**
     * Список категорий
     *
     * @var array
     */
    public $categories = array();

    /**
     * Статус по умолчанию
     *
     * @var int
     */
    public $defaultState = 0;

    /**
     * Список статусов
     *
     * @var array
     */
    public $states = array();

    /**
     * Метод, возвращающий id текущего пользователя.
     * Если переменная неопределена или метод возвращает логическое FALSE - доступ к модулю запрещен.
     *
     * @var callable
     */
    public $getUserId;

    /**
     * Метод, возвращающий id текущего пользователя, которому разрешено отвечать в тикет.
     * Модель Tickets передается в качестве первого параметра в метод.
     * Если метод возвращает логическое FALSE - доступ к ответам запрещен.
     *
     * @var callable
     */
    public $getAnswerUserId;

    /**
     * Метод возвращает имя пользователя по id
     *
     * @var callable
     */
    public $getUserName;

    /**
     * Метод определяет является ли текущий пользователь суперпользователем
     *
     * @var callable
     */
    public $isSuperUser;

    protected function init() {
        parent::init();

        $this->setImport(array('tickets.components.*'));
        $this->setImport(array('tickets.models.*'));
        $this->setImport(array('tickets.models.base.*'));
    }

    public function getUserId() {
        if (!$this->getUserId) {
            return false;
        }

        return call_user_func($this->getUserId);
    }

    public function getAnswerUserId(Tickets $model) {
        if (!$this->getAnswerUserId) {
            return false;
        }

        return call_user_func_array($this->getAnswerUserId, array($model));
    }

    public function getUserName($id) {
        if (!$this->getUserName) {
            return $id;
        }

        return call_user_func_array($this->getUserName, array($id));
    }

    public function isSuperUser() {
        if (!$this->isSuperUser) {
            return false;
        }

        return call_user_func($this->isSuperUser);
    }

}