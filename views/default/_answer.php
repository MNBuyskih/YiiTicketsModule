<?php
/**
 * _answer.php
 * Date: 30.06.14
 * Time: 16:27
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 *
 * @var DefaultController $this
 * @var Tickets $model
 * @var TicketAnswers $answer
 */
?>
<div class="well ticket-answer">
    <div class="pull-right ticket-create"><?= date('d.m.Y H:i', strtotime($answer->create)) ?></div>
    <div class="ticket-user"><i class="icon-user"></i>
        <strong><?= $this->module->getUserName($answer->user_id) ?></strong></div>
    <div class="ticket-message"><?= $answer->message ?></div>
</div>