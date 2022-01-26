<?php

namespace app\models;

use app\components\providers\UniversityProvider;
use yii\base\Model;
use yii\data\ArrayDataProvider;

class University extends Model
{
    /**
     * @var string Name of university
     */
    public $name;

    /**
     * @var string Country of university
     */
    public $country;

    /**
     * @var int page number
     */
    public $page = 1;

    /**
     * @var int page size
     */
    public $limit;


    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        return [
            [['name', 'country'], 'string'],
            ['limit', 'default', 'value' => 20],
            ['page', 'default', 'value' => 1],
            [['page', 'limit'], 'number', 'integerOnly' => true]
        ];
    }

    /**
     * Returns university data provider
     *
     * @param array $params
     * @return ArrayDataProvider
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function getDataProvider(array $params): ArrayDataProvider
    {
        $this->load($params);

        if ($this->validate()) {
            /** @var UniversityProvider $universityProvider */
            $universityProvider = \Yii::$container->get('UniversityProvider');
            $data = $universityProvider->search($this->name, $this->country);
        }

        return new ArrayDataProvider([
            'allModels' => $data ?? [],
            'pagination' => [
                'pageSize' => $this->limit,
            ],
        ]);
    }
}
