<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SmsController extends Controller
{
    public function actionIndex()
    {
        
    
        $mail=Yii::$app->mailer->compose()
        ->setFrom('raulrotundo@gmail.com')
        ->setTo('1137711976@mms.ctimovil.com.ar')
        ->setSubject('Message subject')
        ->setTextBody('Plain text content')
        ->setHtmlBody('<b>HTML content</b>')
        ->send();
        if ($mail)
            $message='Message sent!';
        else
            $message='Message not sent';
        
        return $this->render('index', ['message' => $message]);
    }
}
