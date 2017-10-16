<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\common\behaviors;

use Yii;
use yii\rest\Action;
use yii\web\ServerErrorHttpException;

/**
 * DeleteAction implements the API endpoint for deleting a model.
 *
 * For more details and usage information on DeleteAction, see the [guide article on rest controllers](guide:rest-controllers).
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DeleteAction extends Action
{
    /**
     * Deletes a model.
     * @param mixed $id id of the model to be deleted.
     * @throws ServerErrorHttpException on failure.
     */
    public function run($id)
    {
        //$modelClass = $this->modelClass;
        //$model = $modelClass::findOne(['_id'=>$id]);
        $model = $this->findModel($id);

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }else{
            return ['_id'=>(string)$model->_id,'status'=>$model::STATUS_delete ];
        }

        //Yii::$app->getResponse()->setStatusCode(204);
        //throw new ServerErrorHttpException('hfsahfdhasn.');

        //return ['ccc'=>$model];
    }


}
