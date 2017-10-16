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
        <_form></_form>
        </Col>

    </Row>
</template>
<script>
    import form from './_form.vue';
    import taskList from './task-list.vue';

    export default {
        components: {'_form':form,'task-list':taskList},
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

        position: absolute;
        left: 0px;
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