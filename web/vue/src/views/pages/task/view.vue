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
        <div class="box box-primary" style="padding: 0 12px;">
            <div class="box-header with-border">
                <h2 class="box-title" style="padding-bottom: 11px;font-size: 1.7em;"> T-MySQL源码研究</h2>

                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="box-body no-padding" >
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
                    <Col span="16" style="padding-right: 30px">
                        <div class="mailbox-read-message">
                        <p>Hello John,</p>

                        <p style="font-size: 14px;    line-height: 26px;">
                            Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                            on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                            master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                            gluten-free. 作者：喷喷更健康
                            链接：https://www.zhihu.com/question/65952667/answer/239205448
                            来源：知乎
                            著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。

                            我觉得码农现在可能真的是最不适合回国的一个行业了，尤其是大软件公司SDE那个track上去的。如果有一个国外中餐馆老板说他要回国开餐馆，所有人都会觉得他石乐志，因为大家都知道他在美国赚的多不是因为他的饭多好吃而是因为他的客户有钱。同样的原理到了码农身上，码农怎么就忽然觉得是自己码的6了呢？爬到了中层管理以后主营业务是抢资源刷存在感，这些你玩的过国内树大根深的老人？00年前后那会国内没什么人懂互联网，也没多少人有那个技术，回来的确是血赚，百度就是这么起来的，问题是现在，两边干的事都差不多，你拿着那边拧螺丝的经验跳回来管拧螺丝的人，凭什么就一定混的好？你的工资里，有多少来自你的技术，多少来自h1b cap，别人不知道自己还没点数？反倒是药厂这种国内外技术差距巨大的行业，虽然在国外比码农穷，中年回国或者开分矿的现在往往成功的一比。在mederex搞出第一个pd1的那个中国老哥，14年被排挤出bms的时候也就是个senior scientist，现在在国内都ceo了。国内现在正是有投资缺技术的时候，药厂这东西需要的技术又非常庞杂，很多中层管理（Director乃至vp）还得经常和技术一线打交道，哪怕你真就只是个拧螺丝的，国内还真有可能找不到会拧这么个螺丝的人。然而老婆怕小三不准我自己回国，她要回又想回北京毒死我，gg</p>

                        <p>Thanks,<br>Jane</p>
                        <Timeline>
                            <TimelineItem>
                                <p class="time">1976年</p>
                                <p class="content">Apple I 问世</p>
                            </TimelineItem>
                            <TimelineItem>
                                <p class="time">1984年</p>
                                <p class="content">发布 Macintosh</p>
                            </TimelineItem>
                            <TimelineItem>
                                <p class="time">2007年</p>
                                <p class="content">发布 iPhone</p>
                            </TimelineItem>
                            <TimelineItem>
                                <p class="time">2010年</p>
                                <p class="content">发布 iPad</p>
                            </TimelineItem>
                            <TimelineItem>
                                <p class="time">2011年10月5日</p>
                                <p class="content">史蒂夫·乔布斯去世</p>
                            </TimelineItem>
                        </Timeline>
                    </div>
                    <ul class="comments">
                        <li>
                            <div class="avatar">
                                <Avatar style="color: #f56a00;background-color: #fde3cf">李维斯</Avatar>
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
                    <Col span="6">
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
    export default {
        components: {'task-list':taskList},
        data () {
            return {
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