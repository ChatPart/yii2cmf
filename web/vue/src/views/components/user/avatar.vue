<template>
        <a class="avatar">
            <Avatar  icon='person'  />
            <!--<p>{{getUser}}</p>-->
        </a>
</template>
<script>
    import axios from 'axios';
    export default {
        /*computed: {
            getUser: function () {
                //let url  = 'http://test.gearblade.com/api/v1/user/info';
                let url  = 'http://yii.com/api/v1/user/info';
                var username= '';

                axios.get(url,{headers: {
                    //'Content-Type': 'application/json'
                }}).then(res=>{

                    username = res.data.username;
//alert(res);
                    console.log(res);


                }).catch(function (error) {
                    console.log("error init."+error)
                });
                return username;
                //return 'dddddddddd';
                // `this` points to the vm instance
                //return this.message.split('').reverse().join('')
            }
        },*/
    }
</script>
