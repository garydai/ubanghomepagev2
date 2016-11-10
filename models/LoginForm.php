<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public  $userId;
    private $_user = false;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
           // ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
     //   echo 'validate';
        if (!$this->hasErrors()) {
            $user = $this->getUser();
           // echo 'validate';
            if (!$user || !$user->validatePassword($this->password)) {
             //   var_dump($attribute);
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
        return ;
        if (!$this->hasErrors()) {
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_URL, '139.224.59.235:1337/login.json'); 
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,
                "Mobile=".$this->username."&Password=".$this->password);
            // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            // 运行cURL，请求网页 
            $ret = curl_exec($curl); 
            
            // 关闭URL请求 
            curl_close($curl); 
            $info = json_decode($ret,true);
            $status =  $info['ResponseStatus']["Message"];
           
            if (!(strpos($status, 'Success') !== false)) 
                $this->addError($attribute, 'Incorrect username or password.');
            else 
            {
                $ubuser = $info["Data"];
                $this->userId = $ubuser["User"]["Id"];

            }
           // $user = $this->getUser();
            //if (!$user || !$user->validatePassword($this->password)) {
              //  $this->addError($attribute, 'Incorrect username or password.');
           // }
        }
    }
    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {

       // echo $this->username;
        if ($this->validate()) {
            
            return Yii::$app->user->login($this->getUser(), 0);
        }
        return false;
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {

            $this->_user = User::findByUsername($this->username);
          //  echo 'techang';
          //  var_dump($this->_user);
          // echo $this->_user['password'];
            //echo 'hh';
        }
        return $this->_user;
    }
}