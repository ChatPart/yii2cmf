<template>
    <div class="board">
            <div class="task-list">
                <h2>项目A</h2>

                <Card v-for="task_item in tasks" style="" class="task">
                    <p class="task-title">
                        <Icon type="ios-film-outline"></Icon>
                        {{ task_item.title }}
                    </p>

                    <div class="card-footer">
                        <span>{{new Date(task_item.created_at)}}</span>
                        <Tag type="dot" closable color="red">重要</Tag>
                        <Tag type="dot" closable color="blue">操作系统</Tag>
                        <Avatar shape="square" icon="person" style="float: right"/>
                    </div>
                </Card>
                <Button  long>新建任务</Button>
            </div>
        {{getList}}
        {{msg}}

    </div>
</template>
<script>
    import axios from 'axios';
    
    function formatDate(date) {
        date.formatDate
    }
    export default {
        data() {
            return {
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
                msg:'',
            }
        },
        computed: {
            getList: function () {
                let url  = 'http://test.gearblade.com/api/v2/max/board?id=5994526c0109b8364b6061d3';
                var cc= '';

                axios.get(url,{headers: {
                    'Content-Type': 'application/json'
                }}).then(res=>{

                    var cc = res.data;

                    console.log(cc);
                    this.tasks = cc.items[1];

                }).catch(function (error) {
                    console.log("error init."+error)
                });
                return cc;
                // `this` points to the vm instance
                //return this.message.split('').reverse().join('')
            }
        },
        mounted() {
            //this.changeLimit();
        }
    }
</script>
<style scoped lang="less">

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


</style>