<?php

namespace app\controllers;

use Yii;
use app\models\conversion\ConversionRatioRecord;
use app\models\conversion\SearchConversionRatioRecord;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConversionRatioController implements the CRUD actions for ConversionRatioRecord model.
 */
class ConversionRatioController extends Controller
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
     * Lists all ConversionRatioRecord models also editing them
     *
     * @param null $edit
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionIndex($edit = null)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ConversionRatioRecord::find(),
        ]);;

        if ($edit){
            $model = $this->findModel($edit);
        } else {
            $model = new ConversionRatioRecord();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', [Yii::t('app', 'Saved successfully')]);
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing ConversionRatioRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ConversionRatioRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param $id
     * @return null|static|ConversionRatioRecord
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ConversionRatioRecord::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
