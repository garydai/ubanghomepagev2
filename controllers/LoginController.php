<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
class LoginController extends Controller
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

    public function actionLogin()
    {


        $model = new LoginForm(); 
        var_dump(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
             
            
             $this->redirect(array('site/index'));
         } else {
            // return $this->render('index', []);
            echo 12;
        }

        return ;

        if(isset($_POST['username']))
        {
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1337/login.json'); 
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,
                "Mobile=".$_POST['username']."&Password=".$_POST['password']);
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            
            // 关闭URL请求 
            curl_close($curl); 
            $info = json_decode($ret,true);
           // $status = $info.ResponseStatus.Message;
            //var_dump( $info['ResponseStatus']);
            $status =  $info['ResponseStatus']["Message"];
           
          //  echo $status;
           // echo strpos($status, 'Success');
            if (!(strpos($status, 'Success') !== false)) 
            {
                echo 123;
                return $this->render('index', []);
               // $this->addError('error', 'Incorrect username or password.');
            }
            else 
            {
                return $this->render('/site/index', []);
             //   $ubuser = $info["Data"];
          #  var_dump( $ubuser["User"]);
           # echo $ubuser["User"]["Id"];
               // $this->userId = $ubuser["User"]["Id"];

            }
        }
    }

}
