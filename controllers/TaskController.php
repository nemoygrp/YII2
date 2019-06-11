<?php

namespace app\controllers;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use app\models\filters\TasksFilter;
use app\models\Test;
use Yii;
use app\models\tables\Tasks;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;


class TaskController extends Controller
{
   // public $layout = false;



    public function actionIndex()
    {
        $month = Yii::$app->request->post('TasksFilter')['create_time'];
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        //var_dump($month);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'month' => $month
        ]);
    }

    public function actionOne($id)
    {
        $comments = \app\models\tables\Comments::getCommentsFromID($id);

        $dataProvider = new ActiveDataProvider([
            'pagination' => false,
            'query' => $comments,
        ]);
        $file = new Test();
        if ($file->load(\Yii::$app->request->post())){
            $file->upload = UploadedFile::getInstance($file,'upload');
            $file->save();

        }

        //var_dump($comments);
        return $this->render('view', [
            'model' =>  $this->findModel($id),
            'dataProvider' => $dataProvider,
            'comments' => $comments,
            'file' => $file
            ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }
        return $this->render("update", [
            'model' => $model,
            'status' => TaskStatuses::getStatusesList(),
            'responsible' => Users::getUsersList()
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}