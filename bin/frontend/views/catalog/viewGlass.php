<?php
use frontend\models\Glass;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
/* @var $dataProvider */
/* @var $searchModel */
$this->title = 'Купить лобовое стекло для иномарок с доставкой по Украине. "ДрайвМакс" - интернет-магазин автозапчастей для иномарок.';
?>

<h1>Лобовые стекла для иномарок</h1>

<div class="catalog-caption ">Для быстрого поиска введите марку или модель в строке "Наименование"</div>

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