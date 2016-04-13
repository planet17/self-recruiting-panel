<?php

namespace apps\web\controllers;

use apps\web\models\Auth\Forms\In;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;
use Yii;

class AuthController extends Controller
{

    public $defaultAction = 'in';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    ['actions' => ['logout'], 'allow' => true, 'roles' => ['@']]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => ['logout' => ['post']],
            ],
        ];
    }


    public function actionIn()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $model = new In();
            if ($model->load(Yii::$app->request->post()) && $model->signIn()) {
                return $this->goHome();
            }
        }

        return $this->render('in', [ 'model' => $model ]);
    }


    public function actionLogout() { Yii::$app->user->logout(); return $this->goHome(); }


    public function actionDummy() { throw new HttpException(501, 'Password/recovery not implemented'); }
}
