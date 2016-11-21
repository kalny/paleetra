<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 24.11.2015
 * Time: 13:05
 */

?>

<ul>
<?php foreach ($permissions as $permission): ?>
    <li><?= $permission['child'] ?></li>
<?php endforeach; ?>
</ul>