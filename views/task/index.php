<?php
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Room to Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index" >


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?


echo \yii\widgets\ListView::widget([
    'itemView' => 'view',
    'dataProvider' => $dataProvider,
    'viewParams' => [
        'hide' => 'true'
    ]
]);


?>

