<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <!--News-->
            <div class="news col-sm-12">
                <h1 class="mainTitle">Welcome to Tech Mag</h1>
                <p class="subTitle">Reviewing and introducing video and photo cameras and introducing technologies relating video and photo digital cameras</p>
                <!--Post-->
                <br>
                <br>
                <br>
                <br>
                <?php
                    //the list view widget is used to show the data provided by the dataProvider which can
                    //contain pagination and search functionality.
                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        // i want each item to be shown by the layout determined in the _item
                        'itemView' => '_item'
                    ]);
                ?>

            </div>
            <!--End of news-->
        </div>
    </div>

</div>
