<?php

namespace app\tests\unit\providers;

class UnivercityProviderTest extends \Codeception\Test\Unit
{
    public function testSearch()
    {
        $universityProvider = \Yii::$container->get('UniversityProvider');
        expect($universityProvider->search('Name', 'Country'))->equals([
            [
                'name' => 'sibsutis',
                'country' => 'russia',
                'domains' => '',
                'web_pages' => '',
            ]
        ]);
    }
}
