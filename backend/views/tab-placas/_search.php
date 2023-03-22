<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TabPlacasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tab-placas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_placa') ?>

    <?= $form->field($model, 'placa') ?>

    <?= $form->field($model, 'id_servicio') ?>

    <?= $form->field($model, 'id_clase') ?>

    <?= $form->field($model, 'id_agencia') ?>

    <?php // echo $form->field($model, 'fecha_llegada') ?>

    <?php // echo $form->field($model, 'fecha_registro_sistema') ?>

    <?php // echo $form->field($model, 'fecha_entrega_usuario') ?>

    <?php // echo $form->field($model, 'disponibilidad_placa') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'estanteria') ?>

    <?php // echo $form->field($model, 'estado_entrega') ?>

    <?php // echo $form->field($model, 'fecha_entrega_sistema') ?>

    <?php // echo $form->field($model, 'tipo_persona_entrega') ?>

    <?php // echo $form->field($model, 'nombre_persona_entrega') ?>

    <?php // echo $form->field($model, 'usuario_ingreso') ?>

    <?php // echo $form->field($model, 'usuario_entrega') ?>

    <?php // echo $form->field($model, 'estado_placa') ?>

    <?php // echo $form->field($model, 'orden_axis') ?>

    <?php // echo $form->field($model, 'tramite_axis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
