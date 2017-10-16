import index from './views/index.vue';
import board from './views/pages/board.vue';
import view from './views/pages/task/view.vue';
import create from './views/pages/task/create.vue';
import checkin from './views/pages/task/checkin.vue';

const routers = [
    {
        path: '/',
        meta: {
            title: ''
        },
        component: (resolve) => require(['./views/layout.vue'], resolve),
        children: [
            {
                path: 'index',
                name: 'index',
                component: index
            },
            {
                path: 'board',
                name: 'board',
                component: board
            },
            {
                path: 'view',
                name: 'view',
                component: view
            },
            {
                path: 'create',
                name: 'create',
                component: create
            },
            {
                path: 'checkin',
                name: 'checkin',
                component: checkin
            }

        ]
    },
    /*{
        path:'/register/:id', // 这里涉及了动态路由匹配，这样我们在组件中push('rigsiter/abc')和push('rigsiter/efg') 都会跳转到同一个register 组件
        name:'register',
        component:resolve => require(['@/components/pages/register'],resolve)
    }*/
];
export default routers;
