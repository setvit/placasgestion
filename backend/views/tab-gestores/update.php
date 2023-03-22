<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TabGestores */

$this->title = 'Actulización de datos: ' . $model->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Listado gestores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gestor, 'url' => ['view', 'id' => $model->id_gestor]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tab-gestores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
