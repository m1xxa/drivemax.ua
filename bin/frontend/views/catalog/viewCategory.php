<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Запчасти для '. $category->name . '. "ДрайвМакс" - интернет магазин запчастей для иномарок.';
?>

<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name],
    ],
]);?>

<div class="catalog-caption">
    Выберите марку своего автомобиля.
</div>


<div class="container">
    <div class="row">
        <?foreach($model as $item):?>
            <div class="category-block col-lg-2">

                <div class="category-image">
                    <?
                    if($item->photo != null){
                        echo Html::a(Html::img('@web/images/catalog/category/' . $item->photo, ['width' => 60 ]),
                            Url::to($category->alias . '/' . $item->alias));
                    }
                    else echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 60 ]),
                        Url::to($category->alias . '/' . $item->alias));



                    ?>
                </div>

                <div class="category-name">
                    <?=Html::a($item->name, Url::to($category->alias . '/' . $item->alias)) ;?>
                </div>



            </div>
        <?endforeach;?>
    </div>
</div>

