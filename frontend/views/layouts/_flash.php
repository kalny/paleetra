<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 10:40
 */

/* @var $message string */
/* @var $error boolean */

$error = Yii::$app->session->getFlash('error');
$success = Yii::$app->session->getFlash('success');
    
?>
    
    
<?php if (!is_null($error)) :  ?>
<div class="flash-message fl-error">
    <img src="/img/error.svg" alt="Error">
    <?= $error ?>
    <a class="close" href=""><i class="fa fa-close"></i></a>
</div>
<?php endif; ?>

<?php if (!is_null($success)) :  ?>
    <div class="flash-message fl-success">
        <img src="/img/success.svg" alt="Success">
        <?= $success ?>
        <a class="close" href=""><i class="fa fa-close"></i></a>
    </div>
<?php endif; ?>
