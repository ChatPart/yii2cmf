<template>

    <Menu active-name="1" theme="dark" width="auto">

        <div class="layout-logo-left">
            <router-link :to="{name:'index'}">
                <h1>E O</h1>
            </router-link>

        </div>
        <MenuGroup title="工作台">
        <MenuItem name="1">
            <Icon type="ios-navigate" :size="iconSize"></Icon>
            <span class="layout-text">工作</span>
        </MenuItem>
        <MenuItem name="2">
            <Icon type="ios-keypad" :size="iconSize"></Icon>

            <router-link :to="{name:'board', query:{}}"
                         class="layout-text" tag="span">
                任务看板
            </router-link>
        </MenuItem>
            <MenuItem name="3">
                <Icon type="ios-analytics" :size="iconSize"></Icon>
                <span class="layout-text">巡检</span>
            </MenuItem>
        <MenuItem name="3">
            <Icon type="ios-analytics" :size="iconSize"></Icon>
            <span class="layout-text">报表</span>
        </MenuItem>
            <MenuItem name="3">
            <Icon type="ios-analytics" :size="iconSize"></Icon>
            <span class="layout-text">客户</span>
        </MenuItem>
            <MenuItem name="3">
            <Icon type="ios-analytics" :size="iconSize"></Icon>
            <span class="layout-text">资源</span>
        </MenuItem>

            <MenuItem name="3">
                <Icon type="ios-analytics" :size="iconSize"></Icon>
                <span class="layout-text">文档库</span>
            </MenuItem>

        </MenuGroup>
        <MenuGroup title="沟通">
            <MenuItem name="4">
                <Icon type="ios-navigate" :size="iconSize"></Icon>
                <span class="layout-text">空间</span>
            </MenuItem>
            <MenuItem name="5">
                <Icon type="ios-keypad" :size="iconSize"></Icon>
                <span class="layout-text">团队</span>
            </MenuItem>
            <MenuItem name="6">
                <Icon type="ios-analytics" :size="iconSize"></Icon>
                <span class="layout-text">沟通</span>
            </MenuItem>
        </MenuGroup>

        <MenuGroup title="other">
            <MenuItem name="4">
                <Icon type="ios-navigate" :size="iconSize"></Icon>
                <span class="layout-text">空间</span>
            </MenuItem>
            <MenuItem name="5">
                <Icon type="ios-keypad" :size="iconSize"></Icon>
                <span class="layout-text">知识</span>
            </MenuItem>

        </MenuGroup>
   <!-- </Menu>
    <Menu :theme="theme3" active-name="1">-->

    </Menu>



</template>
<script>
    export default {
        data () {
            return {
                theme3: 'dark'
            }
        },
        props: ['spanLeft'],
        computed: {
            iconSize() {
                return this.spanLeft === 2 ? 14 : 24;
            }
        },
    }
</script>
<style scoped>
    .layout-logo-left{
        width: 90%;
        height: 30px;
        /*background: #5b6270;*/
        border-radius: 3px;
        margin: 15px auto;
        color: #fff;
        text-align: center;
    }
    .layout-hide-text .layout-text {
        display: none;
    }
    .ivu-menu-vertical .ivu-menu-item, .ivu-menu-vertical .ivu-menu-submenu-title {
        padding: 14px 16px;
    }
    .ivu-menu-vertical .ivu-menu-item-group-title {
        padding-left: 17px;
    }

</style>