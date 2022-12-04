<?php
/* @var $this yii\web\View */
?>

<div class="site-index">
    <div class="container">
        <div class="row">
            <!--News-->
            <div class="news col-sm-12">
                <div class="row post">
                    <div class="col-sm-6 col-md-4">
                        <a href="#"><img src="<?php echo Yii::getAlias('@uploadsUrl') . '/' . $model->image; ?>"></a>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <a href="#" class="productHeader"><?= $model->title ?></a>
                        <p><?= $model->author_name; ?></p>
                        <p><?= date('m-d-Y',$model->created_at); ?></p>
                        <p><?= $model->abstract ?></p>
                        <p><?= $model->content ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>