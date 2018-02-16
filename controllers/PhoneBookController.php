<?php
/**
 * Created by PhpStorm.
 * User: chabibnr
 * Date: 2/16/18
 * Time: 10:01 AM
 */

namespace app\controllers;


use app\models\PhoneBook;
use yii\web\Controller;

class PhoneBookController extends Controller {

    public function actionIndex(){
        $model = new PhoneBook();
        return $this->render('index', [
            'model' => $model
        ]);
    }

}