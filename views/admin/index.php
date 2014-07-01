<?php
/**
 * index.php
 * Date: 01.07.14
 * Time: 9:09
 *
 * @author MNB <buyskih@gmail.com>
 * @package tickets
 *
 * @var AdminController $this
 * @var Tickets $model
 */

$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $model->search(),
    'columns'      => array(
        array(
            'name'  => 'id',
            'value' => 'CHtml::tag("span", array("class" => "label label-success"), "# " . $data->id)',
            'type'  => 'html'
        ),
        array(
            'name'  => 'title',
            'value' => 'CHtml::link($data->title, array("default/answer", "id" => $data->id))',
            'type'  => 'html'
        ),
        array('name' => 'category_id', 'value' => 'Tickets::categories($data->category_id)', 'type' => 'html'),
        array('name' => 'state', 'value' => 'Tickets::states($data->state)', 'type' => "html"),
        array('name' => 'create', 'value' => 'date("d.m.Y H:i", strtotime($data->create))'),
    )
));