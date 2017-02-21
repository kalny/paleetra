<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 10.11.2015
 * Time: 12:05
 */

use yii\helpers\Url;
?>

<ul class="sidebar-menu">
    <li class="header"><?= Yii::t('app', 'LBL_MAIN_NAVIGATION') ?></li>
    <?php foreach($data as $root): ?>

    <?php if (\Yii::$app->user->can($root['rbac'])):  ?>
    <li class="<?= (is_array($root['controller'])?in_array($controller, $root['controller']):$controller==$root['controller'])?'active':'' ?> treeview">
        <a href="#">
            <i class="fa <?= $root['icon'] ?>"></i>
            <span><?= Yii::t('app', $root['title']) ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <?php if(count($root['children']) > 0): ?>
        <ul class="treeview-menu">
            <?php foreach($root['children'] as $leaf): ?>
            <?php
                $route = $leaf['controller'] . '/' . $leaf['action'];
            ?>
            <?php if (\Yii::$app->user->can($leaf['rbac'])):  ?>
            <li <?= ($controller==$leaf['controller'] && $action==$leaf['action'])?'class="active"':'' ?> >
                <a href="<?= Url::to([$route]) ?>">
                    <i class="fa <?= $leaf['icon'] ?>"></i>
                    <span><?= Yii::t('app', $leaf['title']) ?></span>
                    <?php if (isset($leaf['badge']) && $leaf['model']::getNew()->count() > 0): ?>
                    <span class="pull-right-container">
                        <small class="label pull-right <?= $leaf['badge'] ?>"><?= $leaf['model']::getNew()->count() ?></small>
                    </span>
                    <?php endif; ?>
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </li>
    <?php endif; ?>





    <?php endforeach; ?>
</ul>