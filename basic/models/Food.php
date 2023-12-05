<?php

namespace app\models;
use yii\db\ActiveRecord;

class Food extends ActiveRecord {
    public function rules(){
        return [
            [['cost', 'name', 'picture_name'],'required']
        ];
    }
}