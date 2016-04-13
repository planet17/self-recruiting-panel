<?php

namespace apps\web\models\Auth\Models;

use yii\web\HttpException;
use yii\web\IdentityInterface;
use Yii;


class UserIdentity extends User implements IdentityInterface
{


    /**
     * Method return USER by ID
     * @param integer $id
     * @return UserIdentity|null
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => (integer)$id
        ]);
    }


    /**
     * Method return USER by E-Mail
     * @param string $email
     * @return UserIdentity|null
     */
    public static function findByMail($email)
    {
        return static::findOne([
            'email' => $email
        ]);
    }


    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    /**
     * Method return ID of User
     * @return integer id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * It generates a hash random string for auth_key.
     * Function call by:
     *  planet17\ssu\models\Auth\Forms\Up
     *  planet17\ssu\models\Auth\Forms\In
     *  $this->getAuthKey()
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    /**
     * Method need when User to do Sign-In
     * Implements by Interface
     *
     * Function call by:
     *  Yii\web\User
     *
     * @return string auth_key
     */
    public function getAuthKey()
    {
        $this->generateAuthKey();
        $this->save();
        return $this->auth_key;
    }


    /**
     * Validates auth_key from cookies if enableAutoLogin true
     *
     * Function call by:
     *  Yii\web\User
     *
     * @param string $authKey
     * @return null
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    /**
     * Not implemented cause APP did n't have REST-API
     * @inheritdoc
     * @throws HttpException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new HttpException(501, 'Identity by Token is not implemented');
        /* TODO COMPLETE AND TEST THAT
        return static::findOne([
        'access_token' => $token
        ]);
        */
    }
}