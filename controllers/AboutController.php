<?php

namespace app\controllers;

use app\models\About;
use yii\base\Model;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = About::find()->where(['id' => 1])->one();
        return $this->render('index', [
            "model" => $model,
        ]);
    }

}
