<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\OrderProducts;
use frontend\models\Orders;
use frontend\models\Product;
use Yii;
use yii\web\Controller;



class CatalogController extends Controller
{

    const SESSION_KEY = 'order_id';

    public function actionIndex(){
        $model = Category::getCategoryByParentId(0);
        $alphabetCategory = $this->getAlphabetCategoryArray($model);

        return $this->render('viewIndex', ['model' => $model, 'alphabetCategory' => $alphabetCategory]);
    }

    public function actionViewCategory($category){
        $currentCategory = Category::getCategoryByAlias($category);
        $model = Category::getCategoryByParentId($currentCategory->category_id);
        uasort($model, function($a, $b){
            return ($a['name'] < $b['name']) ? -1 : 1;
        });
        return $this->render('viewCategory', ['category' => $currentCategory, 'model' => $model]);
    }

    public function actionViewSubcategory($category, $subcategory){
        $currentCategory = Category::getCategoryByAlias($category);
        $currentSubcategory = Category::getCategoryByAlias($subcategory);
        $model = Category::getCategoryByParentId($currentSubcategory->category_id);
        return $this->render('viewSubcategory', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'model' => $model]);
    }

    public function actionViewProduct($category, $subcategory, $product){
        $currentCategory = Category::getCategoryByAlias($category);
        $currentSubcategory = Category::getCategoryByAlias($subcategory);
        $currentProduct = Category::getCategoryByAlias($product);
        $model = Product::findByCategoryId($currentProduct->category_id);
        $cart = OrderProducts::find()->select('product_id')->
            where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->asArray()->column();

        Yii::$app->user->setReturnUrl(Yii::$app->request->absoluteUrl);

        return $this->render('viewProduct', ['cart'=> $cart, 'category' => $currentCategory,
            'subcategory' => $currentSubcategory, 'product' => $currentProduct, 'model' => $model]);
    }

    public function actionCart() {

        $orderProducts = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->all();
        $isnullproducts = OrderProducts::find()->select('product_id')->
        where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->asArray()->column()==null ? 1: 0;

        return $this->render('viewCart', ['orderProducts' => $orderProducts, 'isnullproducts' => $isnullproducts]);
    }

    public function actionAddToCart($product_id) {
        if(!Yii::$app->session->has(self::SESSION_KEY)){
            $order = new Orders();
            $order->status = 0;
            $order->save();
            Yii::$app->session->set(self::SESSION_KEY, $order->id);
        }

        $product = Product::find()->where(['product_id' => $product_id])->one();

        $orderProducts = new OrderProducts();
        $orderProducts->order_id = Yii::$app->session->get(self::SESSION_KEY);
        $orderProducts->product_id = $product->product_id;
        $orderProducts->product_number = $product->product_number;
        $orderProducts->price = $product->price_value * $product->currency->currency_value;
        $orderProducts->product_name = $product->product_name;
        $orderProducts->brand = $product->brand;
        $orderProducts->warehouse_id = $product->warehouse;
        $orderProducts->count = 1;
        $orderProducts->photo = $product->photo->photo_name;
        $orderProducts->save();

        return $this->goBack();
    }

    public function actionCartClear(){

        Yii::$app->session->remove(self::SESSION_KEY);

        return $this->redirect('@web/cart');

    }

    public function actionDeleteFromCart ($id){
        $orderProducts = OrderProducts::find()
                        ->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY), 'product_id' => $id])->one();
        $orderProducts->delete();

        return $this->redirect('@web/cart');

    }

    public function actionOrder() {
        $model = Orders::find()->where(['id' => Yii::$app->session->get(self::SESSION_KEY)])->one();
        $products = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->all();
        $cart = OrderProducts::find()->select('product_id')->
        where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->asArray()->column();

        if ($cart==null){
            return $this->redirect('site/error');
        };

        if($model->load(Yii::$app->request->post())){
            $model->status = 1;
            $model->save();
            Yii::$app->session->remove(self::SESSION_KEY);

            $this->_mail('support@drivemax.com.ua', 'order@drivemax.com.ua', 'На сайте drivemax.com.ua оформлен заказ!', 'На сайте drivemax.com.ua оформлен заказ!');


            return $this->render('viewSuccess', ['model' => $model, 'products' => $products]);
        }

        return $this->render('viewOrder', ['model' => $model]);
    }

    public function actionAddPosition() {

        return $this->render('viewTemp', ['$time' => date('H:i:s')]);

    }

    public function actionFilter($letter){
        $model = Category::getParentCategoryByFilter($letter);
        $alphabetCategory = $this->getAlphabetCategoryArray($model);


        return $this->render('viewIndex', ['model' => $model, 'alphabetCategory' => $alphabetCategory]);
    }


    /*
     * create massive for alphabet output
     * ['a' => [$category1, $category2], 'b' => [$category3, $category4]]
     */

    private function getAlphabetCategoryArray ($categories) {

        if($categories==null){return null;};

        foreach ($categories as $category) {
            switch($category->name[0]) {
                case 'A':
                    $a[] = $category;
                    $alphabetCategoryArray['a'] = $a;
                    break;
                case 'B':
                    $b[] = $category;
                    $alphabetCategoryArray['b'] = $b;
                    break;
                case 'C':
                    $c[] = $category;
                    $alphabetCategoryArray['c'] = $c;
                    break;
                case 'D':
                    $d[] = $category;
                    $alphabetCategoryArray['d'] = $d;
                    break;
                case 'E':
                    $e[] = $category;
                    $alphabetCategoryArray['e'] = $e;
                    break;
                case 'F':
                    $f[] = $category;
                    $alphabetCategoryArray['f'] = $f;
                    break;
                case 'G':
                    $g[] = $category;
                    $alphabetCategoryArray['g'] = $g;
                    break;
                case 'H':
                    $h[] = $category;
                    $alphabetCategoryArray['h'] = $h;
                    break;
                case 'I':
                    $i[] = $category;
                    $alphabetCategoryArray['i'] = $i;
                    break;
                case 'J':
                    $j[] = $category;
                    $alphabetCategoryArray['j'] = $j;
                    break;
                case 'K':
                    $k[] = $category;
                    $alphabetCategoryArray['k'] = $k;
                    break;
                case 'L':
                    $l[] = $category;
                    $alphabetCategoryArray['l'] = $l;
                    break;
                case 'M':
                    $m[] = $category;
                    $alphabetCategoryArray['m'] = $m;
                    break;
                case 'N':
                    $n[] = $category;
                    $alphabetCategoryArray['n'] = $n;
                    break;
                case 'O':
                    $o[] = $category;
                    $alphabetCategoryArray['o'] = $o;
                    break;
                case 'P':
                    $p[] = $category;
                    $alphabetCategoryArray['p'] = $p;
                    break;
                case 'Q':
                    $q[] = $category;
                    $alphabetCategoryArray['q'] = $q;
                    break;
                case 'R':
                    $r[] = $category;
                    $alphabetCategoryArray['r'] = $r;
                    break;
                case 'S':
                    $s[] = $category;
                    $alphabetCategoryArray['s'] = $s;
                    break;
                case 'T':
                    $t[] = $category;
                    $alphabetCategoryArray['t'] = $t;
                    break;
                case 'U':
                    $u[] = $category;
                    $alphabetCategoryArray['u'] = $u;
                    break;
                case 'V':
                    $v[] = $category;
                    $alphabetCategoryArray['v'] = $v;
                    break;
                case 'W':
                    $w[] = $category;
                    $alphabetCategoryArray['w'] = $w;
                    break;
                case 'X':
                    $x[] = $category;
                    $alphabetCategoryArray['x'] = $x;
                    break;
                case 'Y':
                    $y[] = $category;
                    $alphabetCategoryArray['y'] = $y;
                    break;
                case 'Z':
                    $z[] = $category;
                    $alphabetCategoryArray['z'] = $z;
                    break;
                default:
                    $default[] = $category;
                    $alphabetCategoryArray['Другие'] = $default;
                    break;
            }
        }

        ksort($alphabetCategoryArray);
        $model = array_chunk($alphabetCategoryArray, 6, true);


        return $model;
    }


    private function _mail ($from, $to, $subj, $what){
        $massage = $what;
        $subject = $subj;
        $subject = "=?utf-8?b?".base64_encode($subject)."?=";
        $headers = "From: $from\r\nReply-to:$from\r\nContent-type:text/html;charset=utf-8\r\n";
        mail($to, $subject, $massage, $headers);
    }





}
