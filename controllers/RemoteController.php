<?php
/**
 * HumHub DAV Access
 *
 * @package humhub.modules.humdav
 * @author KeudellCoding
 */

namespace humhub\modules\humdav\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use humhub\components\Response;
use humhub\components\Controller;

class RemoteController extends Controller {
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        $settings = Yii::$app->getModule('humdav')->settings;
        if ((boolean)$settings->get('active', false) !== true) {
            throw new NotFoundHttpException('Module not activated');
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $this->layout = false;
        
        return true;
    }

    public function actionIndex() {
        return $this->render('index');
    }
}
