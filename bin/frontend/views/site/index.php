<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="container">
        <div class="row">
            <?foreach($model as $category):?>
                <div class="col-lg-3">


                    <div class="category-name">
                        <?=$category->name;?>
                    </div>

                    <div class="category-image">
                        <?=$category->photo;?>
                    </div>


                </div>
            <?endforeach;?>
        </div>

    </div>


</div>
