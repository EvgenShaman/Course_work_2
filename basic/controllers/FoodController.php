<?php 
namespace app\controllers;
use app\models\Food;
use Yii;

class FoodController extends \yii\rest\ActiveController {
    public $modelClass = 'app\models\Food';
    public function actionRequest()
    {
        $model = new Food();
        if (Yii::$app->request->isPost){
            $model['cost'] = Yii::$app->request->post()['cost'];
            $model['name'] = Yii::$app->request->post()['name'];
            $model['picture_name'] = Yii::$app->request->post()['picture_name'];
            $model->save();
            return $model;
        }
        if (Yii::$app->request->isGet){
            if (Yii::$app->request->get('food_id') == null){
                $rows = Food::find()->all();
                return $rows;
            }
            else {
                $row = Food::findOne(Yii::$app->request->get('food_id'));
                return $row;
            }
        }
        if (Yii::$app->request->isDelete){
            $food_id = Yii::$app->request->get('food_id');
            $model = Food::findOne($food_id);
            if ($model) {
                $model->delete();
            }
        }
        if (Yii::$app->request->isPut){
            $food_id = Yii::$app->request->post()['food_id'];
            $model = Food::findOne($food_id);
            if (isset(Yii::$app->request->post()['cost'])){
                $model['cost'] = Yii::$app->request->post()['cost'];
            }
            if (isset(Yii::$app->request->post()['name'])){
                $model['name'] = Yii::$app->request->post()['name'];
            }
            if (isset(Yii::$app->request->post()['picture_name'])){
                $model['picture_name'] = Yii::$app->request->post()['picture_name'];
            }
            $model->save();
            return $model;
        }
    }   
}
?>