<template>
    <div class="board">
        <Row>
            <Col span="6">
            <div class="task-list">
                <h2>项目A</h2>

                <Card v-for="task_item in tasks" :key="task_item.id" style="" class="task">
                    <p class="task-title">
                        <Icon type="ios-film-outline"></Icon>
                        {{ task_item.title }}
                    </p>


                    <div class="card-footer">
                        <span>{{taskDate}}</span>
                        <Tag type="dot" closable color="red">重要</Tag>
                        <Tag type="dot" closable color="blue">操作系统</Tag>
                        <Avatar shape="square" icon="person" style="float: right"/>
                    </div>

                </Card>
                
                <Input 
                    v-show="addText" 
                    @on-blur="noTask()"
                    type="textarea" :rows="4" 
                    placeholder="请输入..."  
                    v-model="taskTitle" 
                    @on-keydown.enter="doneTask">
                </Input>
               
                <Button  long v-on:click="newTask">新建任务</Button>
            </div>
            </Col>
            <Col span="6">
            <div class="task-list">
                <h2>日常</h2>

                <Card v-for="task_item in tasks2" :key="task_item.id" style="" class="task">
                    <Row>
                        <p class="task-title">
                            <Icon type="ios-film-outline"></Icon>
                            {{ task_item.title }}
                        </p>
                    </Row>

                    <div class="card-footer">
                        <span>{{ task_item.begin_at }}</span> <Icon type="ios-arrow-thin-right"></Icon>
                        <span>{{ task_item.end_at }}</span>
                        <Tag type="dot" closable color="red">紧急</Tag>
                        <div style="float: right;margin: 2px;">
                            <Button @click="modal2 = true" type="warning" style="margin-bottom: 22px;"> 签 到 </Button>
                            <Modal v-model="modal2" width="360">
                                <p slot="header" style="color:#f60;text-align:center">
                                    <Icon type="information-circled"></Icon>
                                    <span>确认签到</span>
                                </p>
                                <div style="text-align:center">
                                    <p>位置（152,234）</p>
                                    <p>时间（2017-8-9）</p>
                                </div>
                                <div slot="footer">
                                    <Button type="error" size="large" long :loading="modal_loading" @click="del">签到</Button>
                                </div>
                            </Modal>
                            <user-avatar></user-avatar>
                        </div>

                    </div>

                </Card>
            </div>
            </Col>
            <Col span="6">
            <div class="task-list">
                <h2>项目B</h2>

                <Card v-for="task_item in tasks" style="">
                    <p slot="title">
                        <Icon type="ios-film-outline"></Icon>
                        {{ task_item.title }}
                    </p>
                    <a href="#" slot="extra" @click.prevent="changeLimit">
                        <Icon type="ios-loop-strong"></Icon>
                        换一换
                    </a>
                    <ul>
                        <li v-for="item in randomMovieList">
                            <a :href="item.url" target="_blank">{{ item.name }}</a>
                            <span>
                    <Icon type="ios-star" v-for="n in 4" :key="n"></Icon><Icon type="ios-star"
                                                                               v-if="item.rate >= 9.5"></Icon><Icon
                                    type="ios-star-half" v-else></Icon>
                    {{ item.rate }}
                </span>
                        </li>
                    </ul>
                </Card>
            </div>
            </Col>
            <Col span="6">
            <div class="task-list">
                <h2>其它</h2>

                <Card v-for="task_item in tasks" style="">
                    <p slot="title">
                        <Icon type="ios-film-outline"></Icon>
                        {{ task_item.title }}
                    </p>
                    <a href="#" slot="extra" @click.prevent="changeLimit">
                        <Icon type="ios-loop-strong"></Icon>
                        换一换
                    </a>
                    <ul>
                        <li v-for="item in randomMovieList">
                            <a :href="item.url" target="_blank">{{ item.name }}</a>
                            <span>
                    <Icon type="ios-star" v-for="n in 4" :key="n"></Icon><Icon type="ios-star"
                                                                               v-if="item.rate >= 9.5"></Icon><Icon
                                    type="ios-star-half" v-else></Icon>
                    {{ item.rate }}
                </span>
                        </li>
                    </ul>
                </Card>
            </div>
            </Col>
        </Row>

    </div>
</template>
<script>
    import userAvatar from '../components/user/avatar.vue';

var date = new Date()
var nowMonth = date.getMonth() + 1;
var strDate = date.getDate();
var seperator = "-";
if (nowMonth >= 1 && nowMonth <= 9) {
   nowMonth = "0" + nowMonth;
}
if (strDate >= 0 && strDate <= 9) {
   strDate = "0" + strDate;
}
var nowDate = nowMonth + seperator + strDate;

    export default {
        components: {'user-avatar':userAvatar},
        data() {
            return {
                taskDate: nowDate,
                taskTitle:'',
                addText:false,
                tasks: [
                    {
                        title: 'unix重构设计',
                        description: 'Vue 的理念问题',
                        member: [],
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                    {
                        title: '修理拖把',
                        description: 'Vue 的理念问题',
                        member: [],
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                    {
                        title: '使用Service Worker做一个PWA离线网页应用',
                        description: 'Vue 的理念问题',
                        member: [],
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                    {
                        title: 'T-MySQL源码研究',
                        description: 'Vue 的理念问题',
                        member: [],
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                ],
                tasks2:[
                    {
                        title: '今日签到 周四',
                        description: 'Vue 的理念问题',
                        member: [],
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                    {
                        title: '去往郫县犀浦镇工地',
                        description: 'Vue 的理念问题',
                        member: [],
                        created_by: 1,
                        begin_at: '12/3',
                        end_at: '1/15',
                        status: 1
                    },
                ],
                movieList: [
                    {
                        name: '肖申克的救赎',
                        url: 'https://movie.douban.com/subject/1292052/',
                        rate: 9.6
                    },
                    {
                        name: '这个杀手不太冷',
                        url: 'https://movie.douban.com/subject/1295644/',
                        rate: 9.4
                    },
                    {
                        name: '霸王别姬',
                        url: 'https://movie.douban.com/subject/1291546/',
                        rate: 9.5
                    },
                    {
                        name: '阿甘正传',
                        url: 'https://movie.douban.com/subject/1292720/',
                        rate: 9.4
                    },
                    {
                        name: '美丽人生',
                        url: 'https://movie.douban.com/subject/1292063/',
                        rate: 9.5
                    },
                    {
                        name: '千与千寻',
                        url: 'https://movie.douban.com/subject/1291561/',
                        rate: 9.2
                    },
                    {
                        name: '辛德勒的名单',
                        url: 'https://movie.douban.com/subject/1295124/',
                        rate: 9.4
                    },
                    {
                        name: '海上钢琴师',
                        url: 'https://movie.douban.com/subject/1292001/',
                        rate: 9.2
                    },
                    {
                        name: '机器人总动员',
                        url: 'https://movie.douban.com/subject/2131459/',
                        rate: 9.3
                    },
                    {
                        name: '盗梦空间',
                        url: 'https://movie.douban.com/subject/3541415/',
                        rate: 9.2
                    }
                ],
                randomMovieList: [],
                modal2: false,
            }
        },
        methods: {
            changeLimit() {
                function getArrayItems(arr, num) {
                    const temp_array = [];
                    for (let index in arr) {
                        temp_array.push(arr[index]);
                    }
                    const return_array = [];
                    for (let i = 0; i < num; i++) {
                        if (temp_array.length > 0) {
                            const arrIndex = Math.floor(Math.random() * temp_array.length);
                            return_array[i] = temp_array[arrIndex];
                            temp_array.splice(arrIndex, 1);
                        } else {
                            break;
                        }
                    }
                    return return_array;
                }

                this.randomMovieList = getArrayItems(this.movieList, 5);
            },
            newTask() {
                this.addText = true 
            },
            doneTask(){
                this.tasks.push({
                    title: this.taskTitle,
                    description: 'Vue 的理念问题',
                    member: [],
                    begin_at: '12/3',
                    end_at: '1/15',
                    status: 1
                })
                this.taskTitle=''
            },
            noTask(){
                this.addText = false
            },
            del () {
                this.modal_loading = true;
                setTimeout(() => {
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.$Message.success('删除成功');
                }, 2000);
            }
        },
        mounted() {
            this.changeLimit();
        }
    }
</script>
<style scoped lang="less">
    .ivu-card-body {
        padding: 12px 11px;
    }
    .board {
        .ivu-card-body {
            padding: 12px 11px;
        }
        .task-list {
            background: #ccc;
            padding: 4px 6px;
            margin-right: 11px;
        }
        .task{
            .task-title{
                font-size:15px;
                font-weight:500;
                color:#111;
            }
            .card-footer{
                border-top:1px solid #e9e9e9;
            }
        }

    }
</style>