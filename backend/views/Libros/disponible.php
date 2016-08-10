<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Libros;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $this->title = Yii::t('app', 'Libros Disponibles');
    $this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>


<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'autor',
            'categoria',
            'sinopsis:ntext',
            'status',
            
    ['class' => 'yii\grid\ActionColumn',
       'template' => '{view}',]
        ],
    ]); ?>