<?php
/**
 * AdminController.php
 * Date: 01.07.14
 * Time: 9:08
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class AdminController
 */
class AdminController extends TicketsController {

    public function actionIndex() {
        if (!$this->module->isSuperUser()) {
            throw new CHttpException(403, 'Restricted access');
        }

        $model = new Tickets('search');
        $model->unsetAttributes();
        if (isset($_GET['Tickets'])) {
            $model->attributes = $_GET['Tickets'];
        }

        $this->render('index', array('model' => $model));
    }

}