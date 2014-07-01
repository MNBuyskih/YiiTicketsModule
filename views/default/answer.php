<?php
/**
 * answer.php
 * Date: 30.06.14
 * Time: 15:30
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 *
 * @var DefaultController $this
 * @var Tickets $model
 * @var TicketAnswers $answer
 * @var TbActiveForm $form
 */
?>
<h1 class="ticket-title"><?= CHtml::encode($model->title) ?></h1>
<div class="alert alert-error ticket-message">
    <div class="pull-right ticket-create"><?= date('d.m.Y H:i', strtotime($model->create)) ?></div>
    <strong class="ticket-user"><i class="icon-user"></i> <?= $this->module->getUserName($model->user_id) ?></strong>

    <div class="ticket-title"><?= CHtml::encode($model->title) ?></div>
</div>

<?
foreach ($model->answers as $_answer) {
    $this->renderPartial('_answer', array('model' => $model, 'answer' => $_answer));
}
?>

<div class="ticket-form">
    <?
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm');
    echo $form->errorSummary($answer);
    echo $form->textAreaRow($answer, 'message');
    ?>
    <div>
        <a onclick="history.back(); return false;" href="#" class="btn"><i class="icon-arrow-left"></i> Вернуться назад</a>
        <button class="btn btn-success" type="submit"><i class="icon-ok"></i> Отправить сообщение</button>
    </div>
    <?
    $this->endWidget();
    ?>
</div>