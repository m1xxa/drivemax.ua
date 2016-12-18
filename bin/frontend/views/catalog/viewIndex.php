<?php

/* @var $this yii\web\View */
/* @var $alphabetCategory */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Магазин автозапчастей "ДрайвМакс". У нас можно купить запчасти с доставкой по Украине.';


?>
<div class="site-index">

    <h1>Каталог запчастей кузова и оптики.</h1>

    <div class="alphabet-container">
        <div class="alphabet-caption">Фильтр по алфавиту:</div>
        <div class="alphabet-buttons">
            <?for($i='A'; $i<'Z'; $i++):?>
                <span><?=Html::a($i, Url::to('@web/catalog/filter/' . $i), ['class' =>  'btn btn-default'])?></span>
            <?endfor;?>
            <span><?=Html::a('Z', Url::to('@web/catalog/filter/z'), ['class' =>  'btn btn-default'])?></span>
            <span><?=Html::a('ВСЕ', Url::to('@web/'), ['class' =>  'btn btn-default'])?></span>
        </div>
    </div>
    <div class="catalog-container">
        <div class="catalog-caption ">Для начала поиска выберите модель</div>
        <div class="catalog-entry">
            <?for($i=0; $i<count($alphabetCategory); $i++):?>
                <div class="col-lg-3">
                    <?foreach($alphabetCategory[$i] as $key => $category):?>
                        <div class="item-container">
                            <div class="item-letter"><?=strtoupper($key)?></div>
                            <div class="item-list">
                                <?for($y=0; $y<count($category); $y++):?>
                                    <ul>
                                        <li>
                                            <div class="item-photo">
                                                <?if(!$category[$y]->photo==null){
                                                    echo Html::a(Html::img('@web/images/catalog/category/'
                                                        . $category[$y]->photo, ['width' => 40 ]),
                                                        Url::to('catalog/' . $category[$y]->alias));
                                                }
                                                ?>
                                            </div>
                                            <div class="item-name">
                                                <?=Html::a($category[$y]->name, Url::to('@web/catalog/'
                                                    . $category[$y]->alias)) ;?>
                                            </div>
                                        </li>
                                    </ul>
                                <?endfor?>
                            </div>
                        </div>
                    <?endforeach?>
                </div>
            <?endfor?>
        </div>
    </div>
</div>
