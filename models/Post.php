<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property int $cat_id
 * @property string $abstract
 * @property string|null $content
 * @property string $author_name
 * @property string|null $image
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 *
 * @property Category $cat
 */
class Post extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'cat_id', 'abstract', 'author_name', 'created_at', 'updated_at'], 'required'],
            [['cat_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['abstract', 'content'], 'string'],
            [['title', 'author_name'], 'string', 'max' => 255],
            //[['image'], 'file', 'skipOnEmpty' => false],
            //[['image'],'file','extensions' => 'png, jpg, gif'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cat_id' => 'Cat ID',
            'abstract' => 'Abstract',
            'content' => 'Content',
            'author_name' => 'Author Name',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }
    public function getAllCategories()
    {
        return ArrayHelper::map(Category::find()->all(),"id","title");
    }

}
