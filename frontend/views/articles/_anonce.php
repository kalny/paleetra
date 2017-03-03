<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 03.03.17
 * Time: 10:05
 */


/* @var $model \frontend\models\Article */

use yii\helpers\HtmlPurifier;
use frontend\models\Article;
use yii\helpers\Url;

$url = Url::to(['articles/view', 'slug' => $model->slug]);

?>

<h2 class="inner-header"><a href="<?= $url ?>"><?= $model->name ?></a></h2>
<?= HtmlPurifier::process($model->getBody(Article::CT_ANONCE)) ?>
<p><a href="<?= $url ?>">Читать статью »</a></p>
