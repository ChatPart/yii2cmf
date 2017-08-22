<?php

namespace api\modules\v2;

/**
 * v2 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\v2\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        \Yii::$app->set('response', [
            'class' => 'yii\web\Response',
            'format' => 'json',
            'on afterSend' => function ($event) {
            },
            'on beforeSend' => function($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    if (!$response->isSuccessful) {
                        $result = $response->data;
                        if ($response->statusCode == 422) {
                            $response->data = [
                                'errcode' => $response->statusCode,
                                'errmsg' => $result[0]['message'],
                            ];
                        } else {
                            $response->data = [
                                'errcode' => isset($result['status']) ? $result['status'] : $response->statusCode,
                                'errmsg' => $result['message'],
                            ];
                        }
                        $response->statusCode = 200;
                    } else {
                        $result = $response->data;
                        $response->data = array_merge([
                            'errcode' => 0,
                            'errmsg' => 'ok',
                        ], $result);

                    }
                }
            }
        ]);

        // custom initialization code goes here
    }
}
