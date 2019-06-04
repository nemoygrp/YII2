
<div class="col-6">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3><?=$nameTask?></h3>
                <p><?=$description?></p><p><?=$deadline?></p>
                <p>
                    <?= yii\helpers\Html::a('View', ['view', 'id' => $id], ['class' => 'btn btn-primary']) ?>
                    <?= yii\helpers\Html::a('Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>
                    <?= yii\helpers\Html::a('Delete', ['delete', 'id' => $id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
        </div>
</div>
</div>
