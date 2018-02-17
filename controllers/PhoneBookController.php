<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class PhoneBookController extends Controller {

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => \app\models\PhoneBook::find(),
            ]),
        ]);
    }

    public function actionCreate(){
        $model = new \app\models\PhoneBook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

}