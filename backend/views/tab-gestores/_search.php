<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TabGestoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tab-gestores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gestor') ?>

    <?= $form->field($model, 'cedula_gestor') ?>

    <?= $form->field($model, 'nombres_gestor') ?>

    <?= $form->field($model, 'apellidos_gestor') ?>

    <?= $form->field($model, 'casa_comercial') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'fotografia_gestor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
