<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $telephone
 * @property string $rout
 * @property string $date_joined
 * @property string|null $comment
 */
class Team extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'email', 'telephone', 'route', 'joined_date'], 'required'],
            [['telephone'], 'string', 'max' => 10],
            [['joined_date'], 'safe'],
            [['comment'], 'string'],
            [['name', 'route'], 'string', 'max' => 256],
            [['email'], 'string', 'max' => 128],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'route' => 'Current Route',
            'joined_date' => 'Joined Date',
            'comment' => 'Comment',
        ];
    }

}
