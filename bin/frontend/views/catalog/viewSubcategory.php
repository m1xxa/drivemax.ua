<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>
<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name, 'url' => ['catalog/' . $category->alias]],
        ['label' => $subcategory->name],
    ],
]);?>



<div class="container">
    <?foreach($model as $item):?>
        <div class="row">

            <div class="col-lg-4">
                <div class="product-row-name">
                    <?=Html::a($item->name, Url::to($subcategory->alias . '/' . $item->alias))?>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="product-row-button">
                    <?
                    echo Html::a("Узнать наличие и цену", Url::to($subcategory->alias . '/' . $item->alias),
                        ['class' => 'btn btn-success']);
                    ?>
                </div>

            </div>

        </div>
    <?endforeach;?>
</div>



