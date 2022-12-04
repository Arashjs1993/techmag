<div class="admin-menu">
    <ul class="nav flex-column ">
        <li class="nav-item">
            <a class="nav-link active" href="<?= \yii\helpers\Url::to(Yii::$app->homeUrl.'admin/category') ?>">Category management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= \yii\helpers\Url::to(Yii::$app->homeUrl.'admin/post') ?>">Post management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= \yii\helpers\Url::to(Yii::$app->homeUrl.'admin/about') ?>">About</a>
        </li>
    </ul>
</div>
