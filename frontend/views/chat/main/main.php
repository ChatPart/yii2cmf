<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>在线聊天IM</title>

    <link rel="stylesheet" href="<?php echo $static_url; ?>/layui/css/layui.css">
    <style>
        html{background-color: #D9D9D9;}
        .icon_img{
            -webkit-filter: grayscale(1);/* Webkit */
            filter:gray;/* IE6-9 */
            filter: grayscale(1);/* W3C */
        }
    </style>
</head>
<body>
<script src="<?php echo $static_url; ?>layui/layui.js"></script>
<script src="<?php echo $static_url; ?>js/chat.js"></script>
<script src="<?php echo $static_url; ?>js/jquery.min.js"></script>
<script>
    if(!/^http(s*):\/\//.test(location.href)){
        alert('请部署到localhost上查看该演示');
    }

    // 创建一个Socket实例


    $_CONFIG = {
        host            : '127.0.0.1',
        port            : '8991',
        myInfoUrl       : '{"a":"main/chat","m":"check","uid":"10","token":"59baacc71ce79"}',
        initUserUrl     : 'http://webim.com/main.php?a=chat&m=userInit&user_id=10',
        getSwarmUserUrl : 'http://webim.com/main.php?a=chat&m=getSwramUserList',
        uploadImgUrl    : 'http://webim.com/main.php?a=chat&m=uploadImg',
        uploadFileUrl   : 'http://webim.com/main.php?a=chat&m=uploadFile',
        getUserHistoryMsgUrl : 'http://webim.com/main.php/history',
        loginOutUrl : '{"a":"main/chat","m":"loginOut","uid":"10"}',
        loginUrl    : 'http://webim.com/main.php?a=login&m=login',
        saveSignUrl : 'http://webim.com/main.php?a=chat&m=saveSign&user_id=10',
        addFriendUrl : 'http://webim.com/main.php?a=main&m=addFriend&user_id=10',
        checkMsgFriendUrl : 'http://webim.com/main.php?a=main&m=checkMsgFriend&user_id=10',
        checkMsgFriendForSwarmUrl : 'http://webim.com/main.php?a=main&m=checkMsgFriendForSwarm&user_id=10'
    };


    layui.use('layim', function(layim){
        chat.init(layim,$_CONFIG.host,$_CONFIG.port,'<?php echo $uid; ?>');
        //基础配置
        layim.config({

            //初始化接口
            init: {
                url: $_CONFIG.initUserUrl,
                data: {}
            }

            //简约模式（不显示主面板）
            //,brief: true

            //查看群员接口
            ,members: {
                url: $_CONFIG.getSwarmUserUrl,
                data: {}
            }

            ,uploadImage: {
                url: '' //（返回的数据格式见下文）
                ,type: '' //默认post
            }

            ,uploadFile: {
                url: '' //（返回的数据格式见下文）
                ,type: '' //默认post
            }
            ,uploadImage: {
                url: $_CONFIG.uploadImgUrl
            }
            ,uploadFile: {
                url: $_CONFIG.uploadFileUrl
            }

            //,skin: ['aaa.jpg'] //新增皮肤
            //,isfriend: false //是否开启好友
            //,isgroup: false //是否开启群组
            ,chatLog: $_CONFIG.getUserHistoryMsgUrl //聊天记录地址
            ,find: 'http://webim.com/main.php?a=main&m=find&user_id=<?= $uid ?>'
            ,copyright: true //是否授权
        });

        //监听发送消息
        layim.on('sendMessage', function(data){
            var To = data.to;
           // console.info(To);
            var toMsg = null;
            if(To.type=='friend') {
                toMsg = '{"a":"main/chat","m":"sendMsg","user_id":"' + To.id + '","my_id":"' + data.mine.id + '","msg":"' + data.mine.content + '"}';
            }else{
                toMsg = '{"a":"main/chat","m":"sendMsgSwarm","swarm_id":"' + To.id + '","my_id":"' + data.mine.id + '","msg":"' + data.mine.content + '"}';
            }
            chat.clientSendMsg(toMsg);
        });




        //监听在线状态的切换事件
        layim.on('online', function(status){
            toMsg = '{"a":"main/chat","m":"changeOnline","user_id":"<?php echo $uid; ?>","status":"'+status+'"}';
            chat.clientSendMsg(toMsg);
        });


        //layim建立就绪
        layim.on('ready', function(res){


        });

        //监听查看群员
        layim.on('members', function(data){
            //console.log(data);
        });

        //监听聊天窗口的切换
        layim.on('chatChange', function(data){
            //console.log(data);
        });



    });

    function loginOut() {
        chat.loginOut();
    }


    $(function(){
        setTimeout(function(){
            $(".layui-layim-remark").hover(function(){
                $(this).css("cursor","pointer");
            }).click(function(){
                chat.saveSign($(this).text());
            });
        },1000)

    });
</script>
</body>
</html>
