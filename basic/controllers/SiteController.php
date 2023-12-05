<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Food;
use app\models\Usr;
use yii\data\ActiveDataProvider;
use app\models\MyGlobalVariable;

class SiteController extends Controller
{
    public $loged = 'ayaya';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCatalogue()
    {
        $rows = Food::find()->all(); 
        return $this->render('catalogue',['rows'=>$rows]);
    }
    public function actionWorker()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Food::find(),
            'pagination' =>[
                'pageSize' => 20,
            ],
        ]);
        return $this->render('worker',['dataProvider'=>$dataProvider]);

    }
    public function actionAccountmanagement()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Usr::find(),
            'pagination' =>[
                'pageSize' => 20,
            ],
        ]);
        return $this->render('accountmanagement',['dataProvider'=>$dataProvider]);

    }
    public function actionView($id)
    {
        $food_id = $id;
        
        $model = Food::findOne($food_id);
        return $this->render('view', ['model'=>$model]);
    }
    public function actionUpdate($id)
    {
        $food_id = $id;
        $model = Food::findOne($food_id);
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            $dataProvider = new ActiveDataProvider([
                'query' => Food::find(),
                'pagination' =>[
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('worker',['dataProvider'=>$dataProvider]);
        }
        return $this->render('update', ['model'=>$model]);
    }
    public function actionAdd()
    {
        $model = new Food();
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            $dataProvider = new ActiveDataProvider([
                'query' => Food::find(),
                'pagination' =>[
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('worker',['dataProvider'=>$dataProvider]);
        }
        return $this->render('update', ['model'=>$model]);
    }
    public function actionDelete($id)
    {
        $food_id = $id;
        $model = Food::findOne($food_id);
        if ($model) {
            $model->delete();
            $dataProvider = new ActiveDataProvider([
                'query' => Food::find(),
                'pagination' =>[
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('worker',['dataProvider'=>$dataProvider]);
        }
        
        return $this->render('update', ['model'=>$model]);
    }
    public function actionLogin2(){
        $model = new Usr();
        if ($model->load(Yii::$app->request->post())){
            $rows = Usr::find()->all();
            foreach($rows as $row) {
                if (($row['username'] == $model['username']) and ($row['password'] == $model['password'])){
                    Yii::$app->myGlobalVariable->variable = $row;
                    Yii::$app->params['myVariable'] = $row;
                    define('GLOBAL_VARIABLE_1', $row);
                    return GLOBAL_VARIABLE_1['username'];
                    return $this->render('index');
                }
            }
            return $row['username'] . $model['username'] . $row['password'] . $model['password'];
        }
        return $this->render('login2', ['model'=>$model]);
    }
    public function actionLogout2()
    {
        $this->loged = null;
        return $this->render('index');

    }
    public function actionTest(){
        return GLOBAL_VARIABLE_1['username'];
    }
}
