<?php

namespace app\models;
use yii\db\ActiveRecord;

class Usr extends ActiveRecord {
    public function rules(){
        return [
            [['username', 'password'],'required']
        ];
    }
}