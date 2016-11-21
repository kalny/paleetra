<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $exception->getMessage();


if ($exception->statusCode == 404) {
    $color = 'text-yellow';
}else{
    $color = 'text-red';
}
?>
<div class="error-page">
    <h2 class="headline <?= $color ?>"> <?= $exception->statusCode ?></h2>

    <div class="error-content">
        <h3><i class="fa fa-warning <?= $color ?>"></i> <?= Yii::t('app', 'MSG_OOPS') ?> <?= $exception->getMessage() ?></h3>

        <p>
            <!--The above error occurred while the Web server was processing your request.
            Please contact us if you think this is a server error. Thank you.-->
            <?= Yii::t('app', 'MSG_THE_ABOVE_ERROR_OCCURED') ?>
        </p>

        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="<?= Yii::t('app', 'LBL_SEARCH') ?>">

                <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
    <!-- /.error-content -->
</div>
