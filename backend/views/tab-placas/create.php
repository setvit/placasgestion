<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TabPlacas */

$this->title = 'Create Tab Placas';
$this->params['breadcrumbs'][] = ['label' => 'Tab Placas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-placas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
