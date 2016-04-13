<?php
/**
 * User: planet17
 * Date: 05.04.16
 * Time: 19:01
 */
namespace apps\web\models\Auth\Models;

use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "user".
 *
 * @property      integer       $id
 * @property      string        $email
 * @property      string        $password_hash
 * @property      string        $auth_key
 * @property      string        $access_token
 * @property      integer       $created_at
 * @property      integer       $updated_at
 * @property      string        $secret_key
 */
class User extends ActiveRecord
{

    const SCENARIO_SIGN_IN = 'default';
    const SCENARIO_SIGN_UP = 'create';
    const VALIDATE_ERROR_AT_LENGTH = "Trying to set value by another methods!";


    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_SIGN_IN => ['email', 'password_hash', 'updated_at', 'auth_key'],
            self::SCENARIO_SIGN_UP => ['email', 'password_hash', 'updated_at', 'created_at', 'auth_key']
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'filter', 'filter' => 'trim'],
            [['email', 'password', 'auth_key'], 'required',
                'message' => 'Something wrong with {attribute}.',
                'skipOnEmpty' => false
            ],
            ['email', 'string', 'length' => [6, 32],
                "tooLong"    => "Значение «{attribute}» должно содержать максимум {max, number} {max, plural, one{символ} few{символа} many{символов} other{символа}}."
            ],
            ['email', 'email'],
            ['email', 'unique', 'message' => 'This email has already been used.'],
            [ 'password_hash', 'string', 'length' => [60, 60],
                "tooShort"   => self::VALIDATE_ERROR_AT_LENGTH, "tooLong" => self::VALIDATE_ERROR_AT_LENGTH
            ],
            [ 'auth_key', 'string', 'length' => [32, 32],
                "tooShort"   => self::VALIDATE_ERROR_AT_LENGTH, "tooLong" => self::VALIDATE_ERROR_AT_LENGTH
            ],
            ['updated_at', 'filter',
                'filter' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
            ['created_at', 'default',
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
                'on' => self::SCENARIO_SIGN_UP ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ['email' => 'E-mail', 'password' => 'Password'];
    }
}