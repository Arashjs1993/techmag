<div class="row post">
    <div class="col-sm-6 col-md-4">
        <a href="<?php echo \yii\helpers\Url::to(['post/index', 'id' => $model->id])?>"><img src="<?php echo Yii::getAlias('@uploadsUrl') . '/' . $model->image; ?>"></a>
    </div>
    <div class="col-sm-6 col-md-8">
        <a href="<?php echo \yii\helpers\Url::to(['post/index', 'id' => $model->id])?>" class="productHeader"><?= $model->title ?></a>
        <p><?= $model->author_name; ?></p>
        <p><?= date('m-d-Y',$model->created_at); ?></p>
        <p><?= $model->abstract ?></p>
        <p><a href="<?php echo \yii\helpers\Url::to(['post/index', 'id' => $model->id])?>">Read more</a></p>
    </div>
</div>    <!-- End of post-->