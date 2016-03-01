<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="container about-wrap">
        <div class="aboutHeaderWrap">
            <h1 id="about-header"><?= $content[0]['name'] ?></h1>
        </div>
        <div class="aboutContent">
            <?= $content['content'][0] ?>
        </div>
    </div>

</div>
