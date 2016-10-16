<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>catalog/index</h1>

<?=$categoryid->name;?>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.

</p>

<?foreach($model as $category):?>
    <div class="col-lg-3">

        <div class="category-image">
            <?
            if($category->photo != null){
                echo Html::a(Html::img('@web/images/' . $category->photo, ['width' => 90 ]),
                    Url::to('catalog/' . $category->alias));
            }

            else {
                echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 90 ]),
                    Url::to($category->alias));
            }

            ?>
        </div>

        <div class="category-name">
            <?=Html::a($category->name, Url::to($category->alias)) ;?>
        </div>



    </div>
<?endforeach;?>