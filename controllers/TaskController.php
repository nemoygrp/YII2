<?php
/**
 * Created by PhpStorm.
 * User: NEMOY
 * Date: 24.05.2019
 * Time: 18:38
 */

namespace app\controllers;
use yii\web\Controller;
use app\models\Test;

class TaskController extends Controller
{
    //public $layout = false;
    public function actionTest ()
    {
        $model = new Test();
        // 1 способ загрузки аттрибутов
        /*$model->title = 'Yii2';
        $model->content = 'ramambaharamamburu';
        $model->count = 4;*/
        // 2 Способ загрузки аттрибутов
       /* $model->setAttributes([
            'title' => 'Yii2',
            'content' => 'ramambaharamamburu'
        ]);*/
        // 3 способ загрузки аттрибутов
        $model->load([
            'title' => 'Yii2',
            'content' => 'ramambaharamamburu'
        ], '');

        var_dump($model);
        //var_dump($model->getErrors());
        exit;
        return $this->render('test',[
            'model' => $model
        ]);
    }
}