<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->name;
if(!$hide){
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}

\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">

    <?
    //var_dump($model->name);
    echo \app\widgets\TaskElem::widget([
        //'model' => $model,
        'id' => $model->id,
        'nameTask' => $model->name,
        'description' => $model->description,
        'deadline' => $model->deadline
    ])

    /*DetailView::widget([
        'model' => $model,
        'template' => '<div>{label} : {value}</div>',
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'status',
                'value' => $model->status->name,
                'format' => 'html'
            ],
            'description:html',
            'creator_id',
            'responsible_id',
            'deadline',
            'status_id',
        ],
        'options' => [
            'tag' => 'div',
        ]
    ]) */?>


</div>
