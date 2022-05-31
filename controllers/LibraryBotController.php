<?php

namespace app\controllers;

use aki\telegram\base\Command;
use aki\telegram\Telegram;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class LibraryBotController extends Controller
{
    public $enableCsrfValidation = false;
    public $url = 'https://1d93-84-54-90-166.eu.ngrok.io'; // Shu controllerdagi library-bot/hook ga yo'naltirish kerak
    public $controller_name = 'library-bot'; // controllerni o'zgartirsangiz, o'zingizga moslab qo'yasiz
    public $bot;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['set', 'unset', 'hook'], // barcha actionlar ro'yhati
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['hook'], // authorizatsiyadan o'tmagan faoydalanuvchi
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['set', 'unset'], // authorizatsiyadan o'tgan foydalanuvchi
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

    /**
     * @return mixed|object|Telegram|null
     */
    public function getBot(){
        return Yii::$app->telegram;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function actionSet(){
        $bot = $this->getBot();
        $result = $bot->setWebhook([
            'url' => $this->url . '/'. $this->controller_name .'/hook'
        ]);
        echo $result['description'];
    }

    public function actionUnSet(){
        $bot = $this->getBot();
        $result = $bot->deleteWebhook();
        echo $result['description'];
    }

    public function actionHook(){
        try {
            Command::run("/start", function($telegram){
                $result = $telegram->sendMessage([
                    'chat_id' => $telegram->input->message->chat->id,
                    "text" => "Assalomu alaykum, hush kelibsiz!"
                ]);
            });

        } catch (Exception $e) {
            return $e->getMessage();
        }
        return 'run';
    }
}
