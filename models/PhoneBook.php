<?php

namespace app\models;

use yii\db\ActiveRecord;

class PhoneBook extends ActiveRecord {

    public static function tableName() {
        return '{{%phone_book}}';
    }

    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['phone'], 'unique'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }
}
