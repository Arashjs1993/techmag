<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property string $about
 * @property int $id
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about'], 'required'],
            [['about'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'about' => 'About',
            'id' => 'ID',
        ];
    }
}
