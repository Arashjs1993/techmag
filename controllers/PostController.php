<?php

namespace app\controllers;

use app\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        //here after getting the id from index action we fetch from the data base
        //the record associated with that id.
        //we say status=1 so that post are shown only when the status field equals one,
        //and the status field is changed whenever admin actives or deactivates the post in the admin panel.
        $model = Post::find()->where(['id'=>$id])->andWhere(['status' => 1])->one();
        return $this->render('index',[
            //data provider not used here because pagination is not required.
            'model' => $model,
        ]);
    }
}
