<style scoped>
    .time{
        font-size: 14px;
        font-weight: bold;
    }
    .content{
        padding-left: 5px;
    }
</style>
<template>

    <Row>
        <Col span="5">
        <task-list></task-list>
        </Col>

        <Col span="19">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title" style="    padding-bottom: 10px;">周五 7月22日 工作日签到</h2>

                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <!--<h3>Message Subject Is Placed Here</h3>-->
                    <div class="avatar">
                        <Avatar shape="square" icon="person" />
                        <span style="font-size: 15px;    position: relative;    display: inline-block;    overflow: hidden;">
                            老王</span>
                    </div>
                    <h5 style="display: block; padding: 10px 0 20px;">

                        <span class="mailbox-read-time ">15 Feb. 2016 11:03 PM</span>
                        ，截止时间<span class="mailbox-read-time pull-right">20 Feb. 2016 0:00 AM</span>
                    </h5>

                </div>

                <Row>
                    <Col span="19">
                    <check-in-map></check-in-map>
                        <div class="mailbox-read-message">

                        <p>时间.</p>
                        <p>地图.</p>
                        <p>日历.</p>

                        <p>Thanks,<br>Jane</p>

                    </div>
                    <ul class="comments">
                        <li>
                            <div class="avatar">
                                <Avatar style="color: #e00007;background-color: #fde3cf">李维斯</Avatar>
                            </div>
                            <span class="name">John Doe</span>
                            It is a historical process which mankind is carrying out in accordance with the natural laws of human development.
                        </li>
                        <li>
                            <div class="avatar">
                                <Avatar style="color: #10b2f5;background-color: #fdf6c4">吴总</Avatar>
                            </div>
                            <h5 class="name">William Throwing</h5>
                            Seems cool.
                        </li>
                        <li>
                            <div class="avatar">
                                <Avatar style="color: #f56a00;background-color: #fde3cf">镜</Avatar>
                            </div>
                            <Form>
                                <FormItem label="我">
                                    <Input v-model="formItem.textarea" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="请输入..."></Input>
                                </FormItem>
                                <FormItem>
                                    <Button type="primary">提交</Button>
                                    <Button type="ghost" style="margin-left: 8px">取消</Button>
                                </FormItem>
                            </Form>
                        </li>
                    </ul>
                    </Col>
                    <Col span="5">
                    <div class="demo-avatar">
                        <Avatar icon="person" />
                        <Avatar>U</Avatar>
                        <Avatar>USER</Avatar>
                        <Avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" />
                        <Avatar style="color: #f56a00;background-color: #fde3cf">U</Avatar>
                        <Avatar style="background-color: #87d068" icon="person" />
                    </div>
                    </Col>
                </Row>

            </div>
            <div class="box-footer">


            </div>
        </div>
        </Col>

    </Row>
</template>
<script>
    import taskList from './task-list.vue';
    import checkInMap from './checkinmap.vue';
    export default {
        components: {
            'task-list':taskList,
            'check-in-map':checkInMap
        },
        
        data () {
            return {
                
                modal3: false,
                modal4: false,
                modal5: false,
                formItem: {
                    input: '',
                    select: '',
                    radio: 'male',
                    checkbox: [],
                    switch: true,
                    date: '',
                    time: '',
                    slider: [20, 50],
                    textarea: ''
                }
            }
        },
        methods: {
            
        }
    }
</script>
<style scoped lang="less">
    .avatar {
        position: relative;
        margin-right: 20px;
        float: left;
    }
    .comments {
        padding: 0 20px;
        font-size: 13px;
        border-top: 1px solid rgba(0, 0, 0, 0.07);

        li {
            display: block;
            position: relative;
            padding: 15px 0 15px 40px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.07);
        }
         .name {
            color: #58666e;
            display: block;
            font-weight: 600;
        }
        .avatar {

            position: absolute;
            left: 0px;
        }
    }
</style>