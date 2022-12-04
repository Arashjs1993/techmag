<?php

namespace app\controllers;
use app\models\Category;
use app\models\Post;
use yii\data\ActiveDataProvider;


class CategoryController extends \yii\web\Controller
{
    public function actionIndex($title)
    {
        //gets the data from category model where the title=entered query parameter in URL
        $catModel = Category::find()->where(['title' => $title])->one();

        //data provider can get the URL and based on that URL filters the data to be shown.
        $dataProvider = new ActiveDataProvider(['query' => Post::find()->where(['cat_id' => $catModel->id])->andWhere(['status'=>1])->orderBy(['id' => SORT_DESC]),
          'pagination' => ['pageSize' => 15]
        ]);

        return $this->render('index',[
            //we use pagination here because we have many posts to be shown.
            //here the index is rendered with the value taken from $dataProvider
            'dataProvider' => $dataProvider,
            'title' => $title,
        ]);

    }

}
