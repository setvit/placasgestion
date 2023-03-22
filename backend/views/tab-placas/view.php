<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TabPlacas */

$this->title = $model->placa;
$this->params['breadcrumbs'][] = ['label' => 'Inventario placas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tab-placas-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_placa',
            'placa',
            [
                'label' => 'Tipo Servicio',
                'attribute' => 'servicio.descripcion_servicio',
            ],
            [
                'label' => 'Clase automotor',
                'attribute' => 'clase.descripcion_clase',
            ],
            [
                'label' => 'Nombre Agencia',
                'attribute' => 'agencia.descripcion_agencia',
            ],
            'fecha_llegada',
            //'fecha_registro_sistema',
            'fecha_entrega_usuario',
            'disponibilidad_placa',
            'observacion',
            //'estanteria',
            'estado_entrega',
            //'fecha_entrega_sistema',
            'tipo_persona_entrega',
            'nombre_persona_entrega',
            'usuario_ingreso',
            'usuario_entrega',
            'estado_placa',
            'orden_axis',
            'tramite_axis',
        ],
    ]) ?>

</div>
