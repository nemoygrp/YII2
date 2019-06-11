<?php
use yii\helpers\Url;

/** @var $model \app\models\tables\Tasks */
?>

<div class="comment-container">
    <?php if ($linked): ?>
    <a class="comment-preview-link" href="<?= Url::to(['task/one', 'id' => $model->id]) ?>">
        <? endif; ?>
        <div class="comment-preview">
            <div class="comment-preview-header"><?= $model->user_id ?></div>
            <div class="comment-preview-content"><?= $model->content ?></div>

        </div>
        <?php if ($linked): ?>
    </a>
<? endif; ?>
</div>