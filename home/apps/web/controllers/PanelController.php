<?php /** User: planet17 Date: 13.04.16 Time: 18:42 */

namespace apps\web\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class PanelController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(), 'only' => ['index'],
                'rules' => [['actions' => ['index'], 'allow' => true, 'roles' => ['@']]],
            ]];
    }


    public function actionIndex()
    {
        $model = [];
        return $this->render('default', [ 'model' => $model ]);
    }
}