<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TabGestores */

$this->title = 'Creación de gestor';
$this->params['breadcrumbs'][] = ['label' => 'Listado gestores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-gestores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
