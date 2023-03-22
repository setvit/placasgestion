<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Se ha encontrado un error mientras se procesaba tu solicitud.
    </p>
    <p>
        Comunícate con el administrador del sistema si crees que se trata de un error. Gracias.
    </p>

</div>
