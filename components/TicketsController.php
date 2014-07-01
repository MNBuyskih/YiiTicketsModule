<?php
/**
 * TicketsController.php
 * Date: 30.06.14
 * Time: 15:14
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class TicketsController
 *
 * @property TicketsModule $module
 */
class TicketsController extends CController {

    /**
     * @return TicketsModule
     */
    public function getModule() {
        return Yii::app()->getModule('tickets');
    }
}