
<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;
/** @var \yii\data\ActiveDataProvider $dataProvider */

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
        return \app\widgets\TaskPreview::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
        'class' => 'preview-container'
    ]
])
?>
<?php
$form = ActiveForm::begin([
    'id' => 'selectMonth-form',
    'options' => ['class' => 'form-horizontal'],
]);
$items = [
    '1' => 'Январь',
    '2'=>'Февраль',
    '3'=>'Март',
    '4'=>'Апрель',
    '5'=>'Май',
    '6'=>'Июнь',
    '7'=>'Июль',
    '8'=>'Август',
    '9'=>'Сентябрь',
    '10'=>'Октябрь',
    '11'=>'Ноябрь',
    '12'=>'Декабрь'
];
$params = [
    'prompt' => 'Выберите месяц..',
];

echo $form->field($searchModel, 'create_time')->dropDownList($items,$params); ?>
<div class="form-group">
    <span class="col-lg-offset-1 col-lg-11">Вы выбрали месяц: <?=$month?></span>
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Отфильтровать', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end();?>
