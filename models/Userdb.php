<?php

namespace app\models;

use yii\db\ActiveRecord;

class Userdb extends ActiveRecord
{
	public static function tableName()
    {
        return 'User';
    }
}