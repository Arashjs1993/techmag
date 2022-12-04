<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';

?>
<div class="category-index">
    <div class="container">
        <div class="row">
            <!--News-->
            <div class="news col-sm-12">
                <h1 class="mainTitle"><?php echo $title;?></h1>
                <?php
                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_item',
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>
