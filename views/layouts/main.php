<?php

/* @var $this \yii\web\View */
/* @var $content string */

$categories=\app\models\Category::find()->all();

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <nav>
        <ul>
            <a class="home-btn" href="<?= Yii::$app->homeUrl; ?>"><i class="far fa-home fa-2x"></i></a>
            <li class="main-link"><a href="#">Tech</a>
                <ul class="sub-menu">
                    <?php foreach ($categories as $category){
                        if (strpos($_SERVER['REQUEST_URI'], "admin") !== false){ ?>
                            <li><a href="<?php echo Url::to(['../category/index', 'title' => $category->title]) ?>"><?= $category->title ?></a></li>
                        <?php }else{ ?>
                            <li><a href="<?php echo Url::to(['category/index', 'title' => $category->title]) ?>"><?= $category->title ?></a></li>
                        <?php } ?>

                   <?php } ?>
                </ul>
            </li>
            <!--about is the name of controller and the admin is the name of the module.!-->
            <li class="main-link"><a href="<?= Url::to(Yii::$app->homeUrl . 'about') ?>">About</a></li>
            <li class="main-link"><a href="<?= Url::to(Yii::$app->homeUrl . 'admin') ?>">Admin Panel</a></li>
        </ul>
    </nav>
    <div class="bg-black">
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
    <div class="content container">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
