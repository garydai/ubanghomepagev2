<?php
namespace app\models;
use Yii;
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
  //  public $Id;
  //  public $Username;
    //public $Password;
    public $authKey;
   // public $accessToken;
    
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
      {
          return [
              'id' => 'ID',
              'pid' => 'Pid',
              'username' => 'Username',
              'password' => 'Password',

          ];
      }

    public static function findIdentity($id)
    {
       // echo 'test';
        //var_dump(static::findOne($id));
        //echo 'test2';
        return static::findOne($id);
       // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
      //  foreach (self::$users as $user) {
        //    if ($user['accessToken'] === $token) {
          //      return new static($user);
            //}
       // }
        //return null;
    }
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

       // $user = User::find()->where(['Mobile' => $username])->one();
        $user = User::find()
             ->where(['Mobile' => $username])
             ->asArray()
             ->one();
      //  echo 'hello';
       // var_dump($user);
       // echo 'helloo';
        if($user)
            return new static($user);
        else 
            return null;

       /*

        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
        */
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->Id;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function getUserAndValidate($username, $password)
    {

    }

    public function validatePassword($password)
    {

//        echo 'bb';

        return   $this->Password === strtoupper(sha1($password));
  //      echo 'vv';
    }
    
}