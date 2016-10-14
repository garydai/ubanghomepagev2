<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Discuss;
class RelationshipController extends Controller
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
        
        $curl = curl_init(); 
        $header = array ("Authorization:AppFrame 1-518a5f7fbda344ba9a568ed831b0c34a");
        // 设置你需要抓取的URL 
        curl_setopt($curl, CURLOPT_URL, '114.55.100.9:1337/contact/3001/first.json'); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        // 设置header 响应头是否输出
        curl_setopt($curl, CURLOPT_HEADER, 0); 
        // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
        // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        // 运行cURL，请求网页 
        $ret = curl_exec($curl); 
        curl_setopt($curl, CURLOPT_URL, '114.55.100.9:1337/profile/3001.json');
        $userret = curl_exec($curl);
        // 关闭URL请求 
        curl_close($curl); 
        $info = json_decode($ret,true);
        $info2 = json_decode($userret, true);
        $data  = $info['Data'];
        $user = $info2['Data'];
        //$b = $info['b'];
        return $this->render('index', ['data'=>$data, 'user'=>$user]);
    }

    public function actionFriend()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $curl = curl_init(); 
            $header = array ("Authorization:AppFrame 1-518a5f7fbda344ba9a568ed831b0c34a");
            // 设置你需要抓取的URL 
            curl_setopt($curl, CURLOPT_URL, '114.55.100.9:1337/contact/'.$id.'/first.json'); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            // 设置header 响应头是否输出
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            curl_setopt($curl, CURLOPT_URL, '114.55.100.9:1337/profile/'.$id.'.json');
            $userret = curl_exec($curl);
            // 关闭URL请求 
            curl_close($curl); 
            $info = json_decode($ret,true);
            $info2 = json_decode($userret, true);
            $data  = $info['Data'];
            $user = $info2['Data'];
            //$b = $info['b'];
           // return $this->render('index', ['data'=>$data, 'user'=>$user]);
           // return \yii\helpers\Json::encode($test);
            return  \yii\helpers\Json::encode(array('data'=>$data, 'user'=>$user));
        }
        
       // echo ['data'=>$data, 'user'=>$user];
    }


}
