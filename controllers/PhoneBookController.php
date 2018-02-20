<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PhoneBookController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index', [
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => \app\models\PhoneBook::find(),
            ]),
        ]);
    }

    public function actionCreate() {
        $model = new \app\models\PhoneBook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id) {
        $model = \app\models\PhoneBook::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException("Data tidak ditemukan");
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id) {
        $model = \app\models\PhoneBook::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException("Data tidak ditemukan");
        }

        if ($model->delete()) {
            return $this->redirect(['index']);
        }
    }

}