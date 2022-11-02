     <body class="b">
        <div id="app">
            <div v-for="item in itemList">
                <div class="g">
                    <a class="a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">彩蛋</a>
                </div>
                <div class="jump">
                    <button class="button1" type="submit" href="javascript:void(0)" id="linkbt">紀錄你的分數吧~</button>
                </div>
                <div id="light">
                    <div class="x">
                        <button href="javascript:void(0)" id="closebt">x</button>
                    </div><br><br><br>
                    <div class="mb-3">
                        <a>&nbsp;&nbsp;&nbsp;ID：</a>
                        <input class="form-control" type="text" id="user_id" required="required">
                    </div>
                    <div class="mb-3">
                        <a>密碼：</a>
                        <input class="form-control" autocomplete="off" type="password" id="userpassword" required="required">
                        <br><br><br>
                        <input class="bu" type="button"  value="儲存" id="type" disabled="disabled">
                        <input class="bu" type="button"  value="登入" id="type" @click="fetchData(2,item)">
                        <input class="bu" type="button"  value="註冊" id="type" @click="fetchData(3,item)">
                    </div>
                </div>     
                <div id="fade"></div>
                <div class="P">
                    <img src="style/fire.png">
                </div>
                <div class="C count">
                    餅乾總數： {{item.count}} 塊<br>
                    <input type="submit" class="button" value="烤餅乾" @click="handlePlus(item)" id="fire"/>
                </div><br><br>
                <div class="shop">
                    <h1>商店</h1>
                    <img src="style/shop.jpg" @load="handlePl4(item)">
                </div>
                <br>
                <div class="col">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>道具名稱</th>
                                <th>狀態</th>
                                <th>價格</th>
                                <th>購買</th>
                            </tr>
                            <tr>
                                <td class="am">
                                    <strong>買烤箱</strong><br>
                                    <small>餅乾製造數量+1</small>
                                </td>
                                <td class="am inter">{{item.inter}}個/次</td>
                                <td class="spend am">{{item.spend}}</td>
                                <td class="am">
                                    <button class="button2" @click="handlePl(item)" disabled="disabled" id="buttons">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="am">
                                    <strong>阿嬤幫你烤</strong><br>
                                    <small>固定時間增加餅乾</small>
                                </td>
                                <td class="am m">{{item.m}}個/秒</td>
                                <td class="spend1 am">{{item.spend1}}</td>
                                <td class="am">
                                    <button class="button2" @click="handlePl2(item)" disabled="disabled" id="buttons1">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </td> 
                            </tr>
                            <tr>
                                <td class="am">
                                    <strong>幫阿嬤買新烤箱</strong><br>
                                    <small>餅乾量增加</small>
                                </td>
                                <td class="am mww">{{item.mww}}個</td>
                                <td class="spend2 am">{{item.spend2}}</td>
                                <td class="am">
                                    <button class="button2" @click="handlePl3(item)" disabled="disabled" id="buttons2">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body> 