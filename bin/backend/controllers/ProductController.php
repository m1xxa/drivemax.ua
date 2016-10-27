<?php

namespace backend\controllers;

use frontend\models\ProductCategory;
use frontend\models\ProductPhoto;
use Yii;
use frontend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $category_model = new ProductCategory();
        $photo_model = new ProductPhoto();

        if ($model->load(Yii::$app->request->post()) && $model->save() &&
            $category_model->load(Yii::$app->request->post()) && $category_model->save() &&
            $photo_model->load(Yii::$app->request->post()) && $photo_model->save())
        {
            $category_model->product_id = $model->product_id;
            $category_model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category_model' => $category_model,
                'photo_model' => $photo_model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category_model = ProductCategory::find()->where(['category_id' => $model->category->category_id])->one();
        $photo_model = ProductPhoto::find()->where(['photo_id' => $model->photo->photo_id])->one();



        if ($model->load(Yii::$app->request->post()) && $model->save() &&
            $photo_model->load(Yii::$app->request->post()) && $photo_model->save() &&
            $category_model->load(Yii::$app->request->post()) && $category_model->save())
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        elseif ($category_model->load(Yii::$app->request->post()) && $category_model->save())
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        else {
                return $this->render('update', [
                    'model' => $model,
                    'category_model' => $category_model,
                    'photo_model' => $photo_model,
                ]);
            }
        }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
