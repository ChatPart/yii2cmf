<?php
/**
 * Created by PhpStorm.
 * User: xq
 * Date: 17-9-14
 * Time: 下午3:34
 */
?>

<script>
    var ws = new WebSocket("ws://127.0.0.1:9501");
    //var ws = new WebSocket("ws://echo.websocket.org");

        ws.onopen = function(event) {
        // 发送消息
        ws.send('This is websocket client.');
    };

    // 监听消息
    ws.onmessage = function(event) {
        console.log('Client received a message: ', event.data);
    };
    ws.onclose = function(event) {
        console.log('Client has closed.\n', event);
    };
</script>
