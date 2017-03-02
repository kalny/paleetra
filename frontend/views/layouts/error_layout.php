<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>


<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('_header') ?>
<body>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>