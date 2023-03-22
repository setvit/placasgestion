<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TabGestores */

$this->title = $model->id_gestor;
$this->params['breadcrumbs'][] = ['label' => 'Listado gestores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tab-gestores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_gestor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar gestor', ['delete', 'id' => $model->id_gestor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estás seguro en eliminar a este gestor?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_gestor',
            'cedula_gestor',
            'nombres_gestor',
            'apellidos_gestor',
            'casa_comercial',
            'celular',
            'correo',
            //'fotografia_gestor',
        ],
    ]) ?>

</div>
