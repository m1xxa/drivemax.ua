<?php

/* @var $this yii\web\View */
/* @var $alphabetCategory */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '"ДрайвМакс" - интернет магазин запчастей для иномарок.';


?>
<div class="site-index">
    <div class="alphabet-container">
        <div class="alphabet-caption">
            Фильтр по алфавиту:
        </div>
        <div class="alphabet-buttons">
            <div class="container">
                <div class="row alphabet-buttons">
                    <?for($i='a'; $i<'z'; $i++):?>
                        <span class="btn btn-default"><?=Html::a(strtoupper($i), Url::to('@web/catalog/filter/' . $i))?></span>
                    <?endfor;?>
                    <span class="btn btn-default"><?=Html::a('Z', Url::to('@web/catalog/filter/z'))?></span>
                    <span class="btn btn-default"><?=Html::a('ВСЕ', Url::to('@web/'))?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-container">
        <div class="catalog-caption">
            Для начала поиска выберите модель
        </div>
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
                                            } /*else echo Html::img('@web/images/not_found.jpg'
                                                . $category[$y]->photo, ['width' => 40]);
                                            */?>
                                            </div>
                                            <div class="item-name">
                                            <?=Html::a($category[$y]->name, Url::to('catalog/'
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