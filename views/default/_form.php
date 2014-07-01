<?php
/**
 * _form.php
 * Date: 30.06.14
 * Time: 14:45
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 *
 * @var DefaultController $this
 * @var Tickets $model
 * @var TbActiveForm $form
 */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm');

echo $form->errorSummary($model);

echo $form->dropDownListRow($model, 'category_id', Tickets::categories(),
    array('hint' => 'Обязательно выберите правильный отдел, чтобы вашу промблему решили соответсвующие специалисты'));
echo $form->textFieldRow($model, 'title',
    array('hint' => 'Коротко и по существу опишите суть запроса'));
echo $form->textAreaRow($model, 'message',
    array('hint' => 'Подробно распишите вашу проблему. Если вопрос относится к заказам, обязательно указывайте их номера'));

?>
    <div>
        <a onclick="history.back(); return false;" href="#" class="btn"><i class="icon-arrow-left"></i> Вернуться
            назад</a>
        <button class="btn btn-success" type="submit"><i class="icon-ok"></i> Отправить запрос</button>
    </div>
<?

$this->endWidget();