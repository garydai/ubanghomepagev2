<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
class SiteController extends Controller
{
   // public $enableCsrfValidation = false;
	public $layout='homepage';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        
        
        return $this->render('index', []);
    }

    
    public function actionEmail()
    {
        $name = $_POST['InputName'];
        $email = $_POST['InputEmail'];
        $message = $_POST['InputMessage'];
        
        $cmd = 'echo '.$message.' | mailx -s '.$name.','.$email.' contact@ubangwang.com';
        system($cmd);
        echo $cmd;
       // echo $cmd;
      //  echo '已发送';
           // return $this->render('index', ['discuss'=>$discuss, 'count'=>$count]);
    }


}
