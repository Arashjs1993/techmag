<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="side_bar col-lg-3">
        <?php include Yii::$app->basePath.'/modules/admin/views/default/sidebar.php' ?>
    </div>
    <div class="col-lg-9">
        <div class="post-index">

            <h1><?= $this->title ?></h1>

            <p>
                <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    [
                        'attribute' => 'created_at',
                        'value' => function($row){
                            return date('d-m-Y',$row->created_at);
                        }
                    ],
                    'author_name',
                    [
                        'attribute' => 'image',
                        //to make the item render as html code we use format raw
                        'format'=>'raw',
                        'value' => function($row){
                            return '<img src="'. Yii::getAlias('@uploadsUrl') . '/' . $row->image .'" width="130"  />';
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>

