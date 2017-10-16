<style scoped>
    .layout {
        border: 1px solid #d7dde4;
        background: #f5f7f9;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
    }

    .layout-breadcrumb {
        padding: 10px 15px 0;
    }

    .layout-content {
        min-height: 200px;
        margin: 15px;
        overflow: hidden;
        background: #fff;
        border-radius: 4px;
    }

    .layout-content-main {
        padding: 10px;
    }

    .layout-copy {
        text-align: center;
        padding: 10px 0 20px;
        color: #9ea7b4;
    }

    .layout-menu-left {
        background: #464c5b;
    }

    .layout-header {
        height: 60px;
        background: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    .layout-logo-left {
        width: 90%;
        height: 30px;
        background: #5b6270;
        border-radius: 3px;
        margin: 15px auto;
    }

    .layout-ceiling-main a {
        color: #9ba7b5;
    }

    .layout-hide-text .layout-text {
        display: none;
    }
    .nav-right{
       /* width: 160px;
        height: 50px;
        background: rgba(69, 76, 91, 0.06);
        border-radius: 3px;*/
        float: right;
        position: relative;
        top: 14px;
        right: 6%;
    }
    .ivu-col {
        transition: width .2s ease-in-out;
    }
    .nav-item{
        padding-right: 35px;
        display: inline-block;
    }
    .drop-down-item{
            padding: 5px 30px;
            font-size: 16px !important;
            letter-spacing: 2px;
    }
</style>
<template>
    <div class="layout" :class="{'layout-hide-text': spanLeft < 2}">
        <Row type="flex">
            <Col :span="spanLeft"  class="layout-menu-left">
            <left-menu v-bind:spanLeft="spanLeft" ></left-menu>
            </Col>

            <Col :span="spanRight">
            <div class="layout-header">
                <Button type="text" @click="toggleClick">
                    <Icon type="navicon" size="32"></Icon>
                </Button>
                <!--<div class="nav-right">
                    <div class="nav-item">
                        <Badge count="3" style="">
                            <Icon type="android-notifications" size="32"     style="color: #ccc;"></Icon>

                        </Badge>
                    </div>
                    <div class="nav-item">

                        <Dropdown>
                            <a href="javascript:void(0)">
                                <Badge count="1000" overflow-count="999">

                                    <a href="#" ><user-avatar /></a>
                                </Badge>
                            </a>
                            <DropdownMenu slot="list" class="drop-down-menu">
                                <DropdownItem class="drop-down-item"><Icon type="person"> </Icon> 个人中心</DropdownItem>
                                <DropdownItem class="drop-down-item"><Icon type="android-settings"> </Icon> 设置</DropdownItem>
                                <DropdownItem class="drop-down-item"><Icon type="power"> </Icon> 退出</DropdownItem>

                            </DropdownMenu>
                        </Dropdown>
                    </div>
                </div>-->

            </div>
            <div class="layout-breadcrumb">
                <Breadcrumb>
                    <BreadcrumbItem href="#">首页</BreadcrumbItem>
                    <BreadcrumbItem href="#">应用中心</BreadcrumbItem>
                    <BreadcrumbItem>某应用</BreadcrumbItem>
                </Breadcrumb>
            </div>
            <div class="layout-content">
                <div class="layout-content-main">
                    <router-view></router-view>
                </div>
            </div>
            <div class="layout-copy">
                2016-2019 &copy; GEARBLADE 归锋科技
            </div>
            </Col>
        </Row>
    </div>
</template>
<script>
    import leftMenu from './left-menu.vue';
    //import userAvatar from './components/user/avatar.vue';

    export default {
        components: {
            'left-menu':leftMenu,
            //'user-avatar':userAvatar,
        },
        data() {
            return {
                spanLeft: 2,
                spanRight: 22
            }
        },
        computed: {
            iconSize() {
                return this.spanLeft === 2 ? 14 : 24;
            }
        },
        methods: {
            toggleClick() {
                if (this.spanLeft === 2) {
                    this.spanLeft = 1;
                    this.spanRight = 23;
                } else {
                    this.spanLeft = 2;
                    this.spanRight = 22;
                }
            }
        }
    }
</script>
