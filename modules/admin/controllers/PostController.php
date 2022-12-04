<?php

namespace app\modules\admin\controllers;

use Exception;
use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $model->created_at = time();
        $model->updated_at = time();


        if ($model->load(Yii::$app->request->post())) {

            //Because the image field is not required we check if it is not null upload otherwise just save the model.
            $image = UploadedFile::getInstance($model, 'image');
            if(!empty($image)){

                //image size more than 500Kb is not accepted, otherwise it throws an error "big size",when the
                //image size is bigger than the threshold it returns "null".
                if($image->size != null && $image->size < 500000){
                    $model->save();
                    $recordID = $model->id;
                    $image = UploadedFile::getInstance($model, 'image');
                    $imageName = 'post_' . $recordID . '.' . $image->getExtension();
                    $image->saveAs(Yii::getAlias('@uploadsPath') .'/'. $imageName);
                    $model->image = $imageName;

                }else{
                    return 'big size:' . $image->size;
                }
            }

            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            //by getInstance we get the uploaded image from the form and put it in
            //the instance of the $model.
            //That's the default yii behavior - it renders a hidden input for a fileInput.
            //
            //It should not however affect your output to read in your controller action because you
            // should always read the file blob value via $_FILES or use yii's UploadedFile class and methods.
            $image = UploadedFile::getInstance($model, 'image');
            if(!empty($image)){

                if($image->size != null && $image->size < 500000){
                    $imageName = 'post_' . $model->id . '.' . $image->getExtension();
                    $image->saveAs(Yii::getAlias('@uploadsPath') .'/'. $imageName);
                    $model->image = $imageName;
                }else{
                    return 'big size:' . $image->size;
                }
            }

            $model->save();

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
