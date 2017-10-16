<?php

namespace common\modules\user\models;

use Yii;

/**
 * This is the model class for collection "task".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $user_id
 * @property array $tel 电话
 * @property array $email 邮件
 * @property mixed $gender 性别
 * @property mixed $name 真实姓名
 * @property mixed $account 姓名账号
 * @property mixed $company 公司
 * @property array $department 部门
 * @property array $position
 * @property array $skill 技能
 * @property array $tag 组群标签
 * @property mixed $info 个人简介
 * @property mixed $signature 签名档
 * @property mixed $status 状态
 */
class StaffInfo extends \yii\mongodb\ActiveRecord
{
    const  STATUS_delete = 2;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'task'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'user_id',
            'tel',
            'email',//array

            'gender',
            'name',
            'account',

            'company',
            'department',//array
            'position',
            'skill',//array
            'tag',//array

            'info',
            'signature',

            'status',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'user_id', 'tel', 'email', 'gender', 'name', 'account', 'company', 'department', 'position', 'skill', 'tag', 'info', 'signature',                    'status',], 'safe'],

            [['status', 'sequence'],'integer'],
            [['begin_at', 'end_at','created_at'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'task_list_id' => 'Task List ID',
            'title' => 'Title',
            'description' => 'Description',
            'member' => 'Member',
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'file' => 'File',
            'commit' => 'Commit',
            'cover' => 'Cover',
            'status' => 'Status',
            'created_at' => 'Created At',
            'detail_list_id' => 'Detail List ID',
        ];
    }*/

    /*public function delete()
    {
        $result = false;
        if ($this->beforeDelete()) {
            $result = $this->deleteInternal();
            $this->afterDelete();
        }

        return $result;
    }*/
}
