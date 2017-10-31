<template>
    <Row>

        <Form ref="formItem" :model="formItem" :rules="ruleInline" label-position="top" >
        <Col span="16" style="padding: 0 20px">

            <FormItem label="任务标题" prop="title">
                <Input v-model="formItem.title" placeholder="请输入ccc"></Input>
            </FormItem>

            <FormItem label="起始与结束">
                <DatePicker type="datetimerange" v-model="formItem.title" format="yyyy-MM-dd HH:mm" placeholder="选择日期和时间（不含秒）" style="width: 300px"></DatePicker>
                <Select v-model="formItem.period" multiple style="width:260px">
                    <Option v-for="item in period" :value="item.value" :key="item.value">{{ item.label }}</Option>
                </Select>

            </FormItem>

                <FormItem label="详细描述">
                    <Input v-model="formItem.description" type="textarea" :autosize="{minRows: 6,maxRows: 10}" placeholder="请输入..."></Input>
                </FormItem>

            <FormItem label="附件">
                <Upload
                        multiple
                        type="drag"
                        action="//jsonplaceholder.typicode.com/posts/">
                    <div style="padding: 20px 0">
                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                        <p>点击或将文件拖拽到这里上传</p>
                    </div>
                </Upload>
            </FormItem>

            <FormItem>
                <Button type="primary"  @click="handleSubmit('formItem')">提交</Button>
                <Button type="ghost" @click="create">存草稿</Button>
                <Button type="ghost" style="margin-left: 8px">取消</Button>
            </FormItem>

        </Col>

        <Col span="6" style="padding-right:10px">
        <FormItem label="成员"  >
            <Select v-model="model12" filterable multiple>
                <Option v-for="item in memberList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>
        </FormItem>
        </Col>
        <Col span="6">
        <FormItem label="组织">
            <Select v-model="model12" filterable multiple>
                <Option v-for="item in groupList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>
        </FormItem>
        </Col>
        </Form>
    </Row>

</template>
<script>
    import axios from 'axios';
    export default {
        data () {
            return {
                ruleInline: {
                    title: [
                        { required: true, message: '请填写用户名', trigger: 'blur' }
                    ],

                    description: [
                        { required: true, message: '请填写密码', trigger: 'blur' },
                    ],
                },
                formItem: {
                    title: ' ',
                    description: '',
                    attachment: '',
                    begin_at: '134535323',
                    end_at: '',
                    period: '',
                },
                memberList: [
                    {
                        value: '张全蛋',
                        label: '张全蛋'
                    },
                    {
                        value: '唐马儒',
                        label: '唐马儒'
                    },
                    {
                        value: '王尼玛',
                        label: '王尼玛'
                    },
                    {
                        value: '敖厂长',
                        label: '敖厂长'
                    }
                ],
                groupList: [
                    {
                        value: '工程部',
                        label: '工程部'
                    },
                    {
                        value: '设计部',
                        label: '设计部'
                    },
                    {
                        value: '墙面组',
                        label: '杭州市'
                    },
                    {
                        value: '油漆工',
                        label: '油漆工'
                    }
                ],
                period:[
                    {
                        value: '工作日',
                        label: '工作日'
                    },
                    {
                        value: '周日',
                        label: '周日'
                    },
                    {
                        value: '周六',
                        label: '周六'
                    },
                    {
                        value: '周一',
                        label: '周一'
                    },
                ],
                model10: [],
                model11: '',
                model12: []
            }
        },
        methods:{

            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {

                        axios({
                            url: 'http://test.gearblade.com/api/v2/tasks',
                            method: 'POST',
                            data: this.formItem,
                            transformRequest: [function (data) {

                                let ret = ''
                                for (let it in data) {
                                    ret += encodeURIComponent(it) + '=' + encodeURIComponent(data[it]) + '&'
                                }
                                return ret
                            }],
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }

                        }).then(function(response) {
                            alert(response.data._id);
                        });
                        this.$Message.success('提交成功!');
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                })
            },
            handleReset (name) {
                this.$refs[name].resetFields();
            },
            create(){

                axios({
                    url: 'http://test.gearblade.com/api/v2/boards',
                    method: 'POST',
                    data: {
                        "name": "XQ`s board333333333333",
                        "discription":"咩咩咩咩木"
                    },
                    transformRequest: [function (data) {

                        let ret = ''
                        for (let it in data) {
                            ret += encodeURIComponent(it) + '=' + encodeURIComponent(data[it]) + '&'
                        }
                        return ret
                    }],
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function(response) {
                    alert(response.data._id);
                });
            }
        }
    }
</script>
