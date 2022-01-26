<?php

namespace app\components\providers;

use yii\base\BaseObject;
use yii\web\HttpException;
use yii\httpclient\Client;


class BaseProvider extends BaseObject
{
    public function __construct(Client $client, array $config)
    {
        $this->httpClient = $client;
        $this->host = $config['host'];
        parent::__construct();
    }

    /**
     * Host url of service
     *
     * @var string
     */
    public $host;

    protected $httpClient;

    /**
     * Creates URL for selected route
     * @param string $route
     * @return string
     */
    protected function buildUrl(string $route): string
    {
        return $this->host . '/' . $route;
    }

    /**
     * Sends POST request
     *
     * @param string $action
     * @param array $data
     * @return array
     * @throws HttpException
     */
    protected function post(string $action, array $data = []): array
    {
        $response = $this->httpClient->createRequest()
            ->setMethod('GET')
            ->setUrl($this->buildUrl($action))
            ->setData($data)
            ->send();

        return $response->data;
    }

    /**
     * Sends GET request
     *
     * @param string $action
     * @param array $data
     * @return array
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    protected function get(string $action, array $data = []): array
    {
        $response = $this->httpClient->createRequest()
            ->setMethod('GET')
            ->setUrl($this->buildUrl($action))
            ->setData($data)
            ->send();

        return $response->data;
    }
}
