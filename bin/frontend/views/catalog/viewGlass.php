<?php
use frontend\models\Glass;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

?>


<div class="catalog-caption ">
    Для быстрого поиска введите марку или модель в строке "Наименование"
</div>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      'columns' => [
          'euro_cod',
          'name',
          'kuzov',
          'years',
          'params',
          'brand',
          'color',
          'price',
      ],
  ]) ?>
</div>