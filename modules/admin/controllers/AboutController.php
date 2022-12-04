<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\About;
use app\models\AboutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller
{

    /**
     * Lists all About models.
     * @return mixed
     */
    public function actionIndex()
    {
        //Since we have only one record so we just get the record with id=1.
        $model = About::find()->where(['id' => 1])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
