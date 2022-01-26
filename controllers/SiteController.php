<?php

namespace app\controllers;

use app\models\University;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     * @return array
     */
    protected function verbs(): array
    {
        return [
            'index'    => ['get'],
        ];
    }

    /**
     * Displays list of universities.
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function actionIndex(): string
    {
        $model = new University();
        return $this->render('index', [
            'provider' => $model->getDataProvider(\Yii::$app->request->get()),
            'filterModel' => $model
        ]);
    }
}
