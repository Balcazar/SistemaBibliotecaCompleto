<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Libros;
use app\models\Clientes;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'OK'), ['index'], ['class'=>'btn btn-primary']) ?>
    </p>

     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'Nombre del Libro',
                'value'=> Libros::findOne($model->idLibro)->nombre,
            ],
            [
                'attribute'=>'Nombre del Cliente',
                'value'=> Clientes::findOne($model->idCliente)->nombre,
            ],
            'fechaPrestamo',
        ],
    ]) ?>

</div>
