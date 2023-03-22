<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TabPlacasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-placas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model -> estado_placa == '0')
            {
                return['class' => 'read'];

            }elseif ($model -> estado_placa == '1') 
            {
                return['class' => 'success'];
            }
        },
        'columns' => [            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'visibleButtons' => ['update' => function ($model, $key, $index) 
                {
                    return $model->estado_placa == 0;
                }
    ]


            ],

            [

                'class' => 'yii\grid\SerialColumn',
                //'header' => 'Número de registro',
                //'headerOptions' => ['with' => '80'],
                
                //'template' => '{view} {update} {delete} {link}',

            ],

            'placa',
            //'id_servicio',
            //'id_clase',
            [
                'label' => 'Nombre Agencia',
                'attribute' => 'agencia.descripcion_agencia',
            ],
            //'fecha_llegada',
            //'fecha_registro_sistema',
            //'fecha_entrega_usuario',
            'disponibilidad_placa',
            //'observacion',
            'estanteria',
            'estado_entrega',
            //'fecha_entrega_sistema',
            //'tipo_persona_entrega',
            //'nombre_persona_entrega',
            //'usuario_ingreso',
            //'usuario_entrega',
            //'estado_placa',
            'orden_axis',
            'tramite_axis',

        ],
      //fin columns
    ]); ?>


</div>
