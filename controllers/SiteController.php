<?php

namespace app\controllers;

use app\models\ConversionForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * The main controller.
     *
     * Controls the conversion form
     *
     * @return string
     */
    public function actionIndex()
    {
        $conversionForm = new ConversionForm();

        if ($conversionForm->load(Yii::$app->request->post())) {
            if (!$conversionForm->convert()) {
                Yii::$app->session->setFlash('error', [Yii::t('app', 'Conversion Error!')]);
            }
        }
        return $this->render('index', [
            'conversionForm' => $conversionForm
        ]);
    }

    /**
     * This controller is used for the ajax requests. It return a json object
     *
     * @return array
     */
    public function actionAjaxConversion()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $conversionForm = new ConversionForm();
        if ($conversionForm->load(Yii::$app->request->post())) {
            $conversionForm->convert();
            return $conversionForm->result;
        }
        return $conversionForm->result;
    }
}
