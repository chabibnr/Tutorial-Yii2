<?php


/**
 * @var $dataProvider \yii\data\ArrayDataProvider
 */

echo "<h2>Tutorial Yii2 ArrayDataProvider<br/><small>Menampilkan repo github pada gridview Yii2 dengan ArrayDataProvider</small></h2>";
echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'owner',
        'updated_at:datetime',
        [
            'attribute' => 'url',
            'format' => 'html',
            'value' => function($model){
                return \yii\helpers\Html::a('Buka di Github', $model['url']);
            }
        ]
    ],
]);