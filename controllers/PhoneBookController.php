<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class PhoneBookController extends Controller {

    public function actionCreate(){
        $model = new \app\models\PhoneBook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo "Sukses";
            return;
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

}