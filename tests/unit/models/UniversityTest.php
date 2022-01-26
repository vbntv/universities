<?php

namespace app\tests\unit\models;

use app\models\University;
use yii\data\ArrayDataProvider;

class UnivercityTest extends \Codeception\Test\Unit
{
    public function testGetDataProvider()
    {
        $university = new University();
        expect($university->getDataProvider(['name' => 'SibSutis', 'country' => 'Russia']))->isInstanceOf(ArrayDataProvider::class);
    }

    public function testUniversityProvider()
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

    public function testUniversityValidateName()
    {
        $university = new University(['name' => 1]);
        expect_not($university->validate());
    }

    public function testUniversityValidateCountry()
    {
        $university = new University(['country' => 1]);
        expect_not($university->validate());
    }
}
