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
             if(file_exists('@web/images/' . $category->photo)){
                 echo Html::img('@web/images/' . $category->photo, ['width' => 90 ]);
             }
             else {
                 echo Html::img('@web/images/1.jpg', ['width' => 90 ]);
             }

            ?>
        </div>

        <div class="category-name">
            <?=Html::a($category->name, Url::to($category->alias)) ;?>
        </div>



    </div>
<?endforeach;?>