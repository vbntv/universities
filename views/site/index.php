<?php

use yii\grid\GridView;

$this->title = 'Universities';

/**
 * @var $provider \yii\data\ArrayDataProvider
 * @var $filterModel \app\models\University
 */
?>
<?= GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $filterModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Name',
            'attribute' => 'name',
        ],
        [
            'label' => 'Country',
            'attribute' => 'country',
        ],
        [
            'label' => 'Domains',
            'attribute' => 'domains',
            'value' => function ($model) {
                return implode(', ', $model['domains']);
            }
        ],
        [
            'label' => 'Web pages',
            'attribute' => 'web_pages',
            'value' => function ($model) {
                return implode(', ', $model['web_pages']);
            }
        ],
    ],
    'pager' => [
        'class' => '\yii\widgets\LinkPager',
    ]
]);
?>
