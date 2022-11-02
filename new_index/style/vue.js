var app = new Vue({
    el:'#app',
    data:{
        itemList:[
          {
            count:0,     //餅乾數
            inter:1,     //烤箱數
            spend:1,    //買烤箱花費
            wwe:1.1,     //買烤箱升級倍率
            spend1:10,  //叫阿嬤花費
            ww2:2,       //叫阿嬤升級倍率
            spend2:5,  //幫阿嬤買新烤箱花費
            ww3:1.5,     //幫阿嬤買新烤箱倍率
            m:0,         //阿嬤數
            mww:1,       //阿嬤的烤箱數
            set:0,       //阿嬤幫幫我按扭次數
          }
    ]
    },
    methods:{
        handlePlus: function(item){                 //烤餅乾
            item.count = item.count + item.inter;
            if(item.count >= item.spend){           //判斷餅乾數是否超過按鈕所需花費
                document.getElementById("buttons").disabled = false;
            }
            else{
                document.getElementById("buttons").disabled = true;
            }
            if(item.count >= item.spend1){
                document.getElementById("buttons1").disabled = false;
            }
            else{
                document.getElementById("buttons1").disabled = true;
            }
            if(item.count >= item.spend2 && item.m>0){
                document.getElementById("buttons2").disabled = false;
            }
            else{
                document.getElementById("buttons2").disabled = true;
            }
        },
        handlePl: function(item){                   //購買烤箱
            item.inter++;                           //烤箱+1
            item.count = item.count - item.spend;   //花費
            quit=Math.round(item.spend * item.wwe); //倍率
            item.spend = quit;
            if(item.count >= item.spend){           //判斷餅乾數是否超過按鈕所需花費
                document.getElementById("buttons").disabled = false;
            }
            else{
                document.getElementById("buttons").disabled = true;
            }
            if(item.count >= item.spend1){
                document.getElementById("buttons1").disabled = false;
            }
            else{
                document.getElementById("buttons1").disabled = true;
            }
            if(item.count >= item.spend2 && item.m>0){
                document.getElementById("buttons2").disabled = false;
            }
            else{
                document.getElementById("buttons2").disabled = true;
            }
        },
        handlePl2: function(item){                  //叫阿嬤
            item.set++;                             //按鈕數+1
            item.m++;                               //阿嬤+1
            item.count = item.count-item.spend1;
            quit1 = Math.round(item.spend1 * item.ww2); 
            item.spend1 = quit1;
            if(item.count >= item.spend){
                document.getElementById("buttons").disabled = false;
            }
            else{
                document.getElementById("buttons").disabled = true;
            }
            if(item.count >= item.spend1){
                document.getElementById("buttons1").disabled = false;
            }
            else{
                document.getElementById("buttons1").disabled = true;
            }
            if(item.count >= item.spend2 && item.m>0){
                document.getElementById("buttons2").disabled = false;
            }
            else{
                document.getElementById("buttons2").disabled = true;
            }
            if(item.set == 1){this.handlePl4(item);} //按第一次時執行自動增加餅乾
        },
        handlePl3: function(item){                  //幫阿嬤買新烤箱
            item.mww++;                             //烤箱數+1
            item.count = item.count-item.spend2;
            quit2 = Math.round(item.spend2 * item.ww3);
            item.spend2 = quit2;
            if(item.count >= item.spend){
                document.getElementById("buttons").disabled = false;
            }
            else{
                document.getElementById("buttons").disabled = true;
            }
            if(item.count >= item.spend1){
                document.getElementById("buttons1").disabled = false;
            }
            else{
                document.getElementById("buttons1").disabled = true;
            }
            if(item.count >= item.spend2 && item.m>0){
                document.getElementById("buttons2").disabled = false;
            }
            else{
                document.getElementById("buttons2").disabled = true;
            }
        },
        handlePl4: function (item) {                //每一秒自動增加
            id = setInterval(function(){
                item.count = item.count + item.m * item.mww;
                if(item.count >= item.spend){
                    document.getElementById("buttons").disabled = false;
                }
                else{
                    document.getElementById("buttons").disabled = true;
                }
                if(item.count >= item.spend1){
                    document.getElementById("buttons1").disabled = false;
                }
                else{
                    document.getElementById("buttons1").disabled = true;
                }
                if(item.count >= item.spend2 && item.m>0){
                    document.getElementById("buttons2").disabled = false;
                }
                else{
                    document.getElementById("buttons2").disabled = true;
                }
            }, 1000);
        }
    }
    
})