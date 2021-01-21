<?php

namespace app\api\modules\v1\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class AuthController extends Controller
{

    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
            ]
        ]);
    }

    protected function verbs()
    {
        return [
            'index' => ['GET'],
        ];
    }

    public function actionIndex()
    {
        return "Anda terhubung... ";
    }
}
