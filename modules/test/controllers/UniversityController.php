<?php
namespace app\modules\test\controllers;

use yii\web\Controller;

class UniversityController extends Controller
{
    public static $responses = [
        'search' => [
            [
                'name' => 'sibsutis',
                'country' => 'russia',
                'domains' => '',
                'web_pages' => '',
            ],
        ]
    ];

    public function actionSearch()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return self::$responses['search'];
    }
}
