<?php
/**
 * index.php
 * Date: 30.06.14
 * Time: 14:07
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 *
 * @var DefaultController $this
 * @var Tickets $model
 * @var Tickets $data
 */

$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $model->search(),
    'columns'      => array(
        array(
            'name'  => 'id',
            'value' => 'CHtml::tag("span", array("class" => "label label-success"), "# " . $data->id)',
            'type'  => 'html'
        ),
        array('name' => 'title', 'value' => 'CHtml::link($data->title, array("answer", "id" => $data->id))', 'type' => 'html'),
        array('name' => 'category_id', 'value' => 'Tickets::categories($data->category_id)', 'type' => 'html'),
        array('name' => 'state', 'value' => 'Tickets::states($data->state)', 'type' => "html"),
        array('name' => 'create', 'value' => 'date("d.m.Y H:i", strtotime($data->create))'),
    )
));

?>
<a class="btn btn-primary" href="<?= $this->createUrl('create') ?>"><i class="icon-plus"></i> Новый запрос</a>