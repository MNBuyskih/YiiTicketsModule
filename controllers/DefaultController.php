<?php
/**
 * DefaultController.php
 * Date: 30.06.14
 * Time: 14:06
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 */

/**
 * Class DefaultController
 */
class DefaultController extends TicketsController {

    public function actionIndex() {
        if (!$this->module->getUserId()) {
            throw new CHttpException(403, 'Restricted access');
        }

        $model = new Tickets('search');
        $model->unsetAttributes();
        if (isset($_GET['Tickets'])) {
            $model->attributes = $_GET['Tickets'];
        }
        $model->user_id = $this->module->getUserId();

        $this->render('index', array('model' => $model));
    }

    public function actionCreate() {
        if (!$this->module->getUserId()) {
            throw new CHttpException(403, 'Restricted access');
        }

        $model = new Tickets();
        if (isset($_POST['Tickets'])) {
            $model->attributes = $_POST['Tickets'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionAnswer($id) {
        /** @var Tickets $model */
        $model = Tickets::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Not found');
        }

        if (!$this->module->getAnswerUserId($model)) {
            throw new CHttpException(403, 'Restricted access');
        }

        $answer = new TicketAnswers();
        if (isset($_POST['TicketAnswers'])) {
            $answer->attributes = $_POST['TicketAnswers'];
            $answer->ticket_id  = $model->id;
            if ($answer->save()) {
                $this->redirect(array('answer', 'id' => $model->id));
            }
        }

        if (isset($_POST['Tickets'])) {
            $model->scenario   = 'state';
            $model->attributes = $_POST['Tickets'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('answer', array('model' => $model, 'answer' => $answer));
    }
}