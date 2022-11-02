<script>  /* 餅乾動作 */
        var app = new Vue({
            el:'#app',
            data:{
                itemList:[
                {
                    count:<?php echo $_SESSION['c']?>,  //餅乾數
                    inter:<?php echo $_SESSION['o']?>,  //烤箱數
                    m:<?php echo $_SESSION['gm']?>,     //阿嬤數
                    mww:<?php echo $_SESSION['gmo']?>,  //阿嬤的烤箱數
                    wwe:1.5,                            //買烤箱升級倍率
                    ww2:3,                              //叫阿嬤升級倍率
                    ww3:2,                              //幫阿嬤買新烤箱倍率
                    spend:Math.round(2 * (1.5 ** (<?php echo $_SESSION['o']?> - 1))),    //買烤箱花費
                    spend1:10 * (3 ** <?php echo $_SESSION['gm']?>),                    //叫阿嬤花費
                    spend2:5 * ( 2 ** (<?php echo $_SESSION['gmo']?> - 1)),             //幫阿嬤買新烤箱花費                                                              //阿嬤幫幫我按扭次數      
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
                },
                fetchData:function(x,item){
                    var json = {
                        "id" : document.getElementById("user_id").value,
                        "password" : document.getElementById("userpassword").value,
                        "c" : item.count,
                        "o" : item.inter,
                        "gm" : item.m,
                        "gmo" : item.mww,
                    };
                    var id = document.getElementById("user_id").value;
                    var password = document.getElementById("userpassword").value;
                    if(id == '' || password == ''){
                        alert("請輸入帳號或密碼");
                    }
                    else{
                        if(x === 1){
                            axios.post('function/save.php',json,{
                                transformRequest:[function(data){
                                return Qs.stringify(data);//把資料轉化為QueryString
                                }]
                            }).then(res=>{
                                console.log(res);
                                if(res.data === 'Sy'){
                                    alert('儲存成功')
                                    light.style.display='none';
                                }
                                else{alert('帳號或密碼錯誤')}
                            });
                        }
                        else if(x === 2){
                            axios.post('function/login.php',json,{
                                transformRequest:[function(data){
                                return Qs.stringify(data);//把資料轉化為QueryString
                                }]
                            }).then(res=>{
                                console.log(res);
                                if(res.data === 'Ly'){
                                    alert('登入成功')
                                    location.reload('index.php');
                                }
                                else{alert('帳號或密碼錯誤')}
                            });
                        }
                        else if(x === 3){
                            axios.post('function/register.php',json,{
                                transformRequest:[function(data){
                                return Qs.stringify(data);//把資料轉化為QueryString
                                }]
                            }).then(res=>{
                                console.log(res);
                                if(res.data === 'Ly'){
                                    alert('註冊成功')
                                    light.style.display='none';
                                }
                                else if(res.data === 'Rn'){alert('此帳戶已註冊')}
                                else{alert('帳號或密碼錯誤')}
                            });
                        }
                        else{alert('帳號或密碼錯誤')}
                    }

                },
                theme:function(x,item){
                    var java = {
                        "id" : document.getElementById("id123").value,
                        "pw" : document.getElementById("pw123").value,
                        "c" : item.count,
                        "o" : item.inter,
                        "gm" : item.m,
                        "gmo" : item.mww,
                        "theme" : x,
                    };
                    axios.post('function/theme.php',java,{
                        transformRequest:[function(data){
                        return Qs.stringify(data);//把資料轉化為QueryString
                        }]
                    }).then(res=>{
                        console.log(res);
                        if(res.data === 'cy'){
                            alert('更改成功')
                            location.reload('index.php');
                        }
                        else{alert('錯誤')}
                    });
                }
            }
        
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/qs/6.10.1/qs.js"></script>