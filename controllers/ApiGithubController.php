<?php

/**
 * @author Chabib Nurozak <chabibdev@gmail.com>
 * @website chabibnr.net
 */

namespace app\controllers;

use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

class ApiGithubController extends Controller {

    public function actionIndex() {
        $client = new Client();
        $response = $client->get('https://api.github.com/users/chabibnr/repos')
            ->addHeaders(['user-agent' => 'Tutorial Yii2 by ChabibNr'])
            ->send();
        if ($response->isOk) {
            $dataFromApi = $response->data;
        }else{
            $dataFromApi = [];
        }
        $data = [];
        /* membuat struktur array baru berdasarkan data yang di ambil dari github untuk dimasukan ke ArrayDataProvider */
        foreach($dataFromApi as $repo){
            $data[] = [
                'id' => $repo['id'],
                'name' => $repo['name'],
                'owner' => $repo['owner']['login'],
                'url' => $repo['html_url'],
                'created_at' => $repo['created_at'],
                'updated_at' => $repo['updated_at']
            ];
        }
        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['id', 'name', 'updated_at'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $provider
        ]);
    }

}