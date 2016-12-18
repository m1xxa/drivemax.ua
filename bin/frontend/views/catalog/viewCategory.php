<?php
/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $category */
use frontend\models\Category;
use kartik\typeahead\Typeahead;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


use yii\widgets\Breadcrumbs;

$this->title = 'Купить запчасти для '. $category->name
    . ' с доставкой по Украине. "ДрайвМакс" - интернет-магазин автозапчастей для иномарок.';
?>

<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name],
    ],
]);?>


    <h1>Автозапчасти кузова и оптики для <?=$category->name?></h1>
    <div class="catalog-caption">Выберите марку своего автомобиля</div>

    <div class="container-fluid">
        <div class="row">
        <?foreach($model as $item):?>
            <div class="category-block col-lg-2">
                <div class="category-image">
                    <?php
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