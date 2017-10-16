<template>
    <div id="check-in-map">
        <Button @click="modal2 = true" type="primary" size="large" style="    width: 150px;"> 签 到 </Button>
                    <Modal v-model="modal2" width="360">
                        <p slot="header" style="color:#f60;text-align:center">
                            <Icon type="information-circled"></Icon>
                            <span>确认签到</span>
                        </p>
                        <div class="amap-page-container">
                            <el-amap vid="amap" style="height:300px" :plugin="plugin" class="amap-demo" :center="center">
                            </el-amap>

                            <div class="toolbar">
                                <span v-if="loaded">
                                    位置: 经度 = {{ lng }} 纬度 = {{ lat }}
                                </span>
                                <span v-else>正在定位</span>
                            </div>
                        </div>
                        <div slot="footer">
                            <Button type="error" size="large" long :loading="modal_loading" @click="del">签到</Button>
                        </div>
                    </Modal>
    </div>
</template>
<script>
var date = new Date()
var nowMonth = date.getUTCMonth() + 1;
var strDate = date.getUTCDate();
var hour = date.getUTCHours();
var minutes = date.getUTCMinutes();
var seconds = date.getUTCSeconds();
var seperator = "-";
if (nowMonth >= 1 && nowMonth <= 9) {
   nowMonth = "0" + nowMonth;
}
if (strDate >= 0 && strDate <= 9) {
   strDate = "0" + strDate;
}
if (hour >= 0 && hour <= 9) {
   hour = "0" + hour;
}
if (minutes >= 0 && minutes <= 9) {
   minutes = "0" + minutes;
}
if (seconds >= 0 && seconds <= 9) {
   seconds = "0" + seconds;
}
var nowDate = date.getUTCFullYear() + seperator + nowMonth + seperator + strDate+'  '+hour+':'+minutes+':'+seconds;
    module.exports = {
      data() {
        let self = this;
        return {
          nowDate,
          modal2:false,    
          modal_loading: false,
          marker:'',
          center: [121.59996, 31.197646],
          lng: 0,
          lat: 0,
          loaded: false,
          plugin: [{
            pName: 'Geolocation',
            events: {
              init(o) {
                // o 是高德地图定位插件实例
               
                o.getCurrentPosition((status, result) => {
                  if (result && result.position) {
                    self.lng = result.position.lng;
                    self.lat = result.position.lat;
                    self.center = [self.lng, self.lat];
                    self.loaded = true;
                    self.$nextTick();
                  }
                });
              }
            }
          }]
        };
      },
      methods: {
            del () {
                this.modal_loading = true;
                setTimeout(() => {
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.$Message.success('签到成功'+nowDate);
                }, 3000);
            }
        }
    };

</script>

<style>
    
</style>
