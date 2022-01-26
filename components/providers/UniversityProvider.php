<?php

namespace app\components\providers;

use yii\httpclient\Client;

class UniversityProvider extends BaseProvider
{
    public function __construct(Client $client, array $config)
    {
        parent::__construct($client, $config);
    }

    /**
     * Get a list of universities from hipolabs
     *
     * @throws \yii\httpclient\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function search(string $name = null, string $country = null): array {
        return $this->get('search', [
            'name' => $name,
            'country' => $country
        ]);
    }
}
