<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 10:40
 */

/* @var $message string */
/* @var $error boolean */

$type = ($error) ? 'error' : 'success';

?>

<div class="flash-message fl-<?= $type ?>">
    <img src="/img/<?= $type ?>.svg" alt="<?= ucfirst($type) ?>">
    <?= $message ?>
    <a class="close" href=""><i class="fa fa-close"></i></a>
</div>

