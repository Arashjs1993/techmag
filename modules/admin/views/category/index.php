<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="side_bar col-lg-3">
        <?php include Yii::$app->basePath.'/modules/admin/views/default/sidebar.php' ?>
    </div>
    <div class="col-lg-9">
        <div class="category-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>


        </div>
    </div>
</div>


