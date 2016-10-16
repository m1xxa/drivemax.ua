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
            <?=Html::img('@web/images/' . $category->photo, ['width' => 90 ])  ;?>
        </div>

        <div class="category-name">
            <?=Html::a($category->name, Url::to($category->alias))  ;?>
        </div>



    </div>
<?endforeach;?>