<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TabPlacas */

$this->title = 'Actualizar placa: ' . $model->placa;
$this->params['breadcrumbs'][] = ['label' => 'Placas EPM', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_placa, 'url' => ['view', 'id' => $model->id_placa]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tab-placas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
