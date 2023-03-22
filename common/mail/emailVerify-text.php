<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Estimado usuario: <?= $user->username ?>,

Por favor da clic en el siguiente enlace para validar tu registro en el sistema de placas:

<?= $verifyLink ?>
