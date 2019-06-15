<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var \yii\data\ActiveDataProvider $dataProvider */
/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->name;
if (!$hide) {
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}

\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">
    <? echo \app\widgets\TaskElem::widget([
        //'model' => $model,
        'id' => $model->id,
        'nameTask' => $model->name,
        'description' => $model->description,
        'deadline' => $model->deadline,
        'comments' => $comments
    ]);
    $form = \yii\widgets\ActiveForm::begin();
    echo $form->field($file, 'upload')->fileInput();
    echo \yii\helpers\Html::submitButton("Load", ['class' => 'btn btn-success']);
    \yii\widgets\ActiveForm::end();
    ?>
    <div>
        <?php
        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function ($comments) {
                return \app\widgets\CommentPreview::widget(['model' => $comments]);
            },
        ]);
        ?>
    </div>


</div>
