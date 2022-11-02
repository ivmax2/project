    <body class="b">
        <div id="app">
            <div v-for="item in itemList">
                <div class="g">
                    <a class="a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">彩蛋</a>
                </div>
                <div class="jump">
                    <button class="button1" type="submit" href="javascript:void(0)" id="linkbt">紀錄你的分數吧~</button>
                    <button class="button1" type="submit" href="javascript:void(0)"  id="theme">主題</button>
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
                        <input class="bu" type="button"  value="儲存" id="type" @click="fetchData(1,item)">
                        <input class="bu" type="button"  value="登入" id="type" @click="fetchData(2,item)">
                        <input class="bu" type="button"  value="註冊" id="type" disabled="disabled">
                    </div>
                </div>     
                <div id="fade">
                    <div class="x">
                        <button href="javascript:void(0)" id="close">x</button>
                    </div><br><br><br>
                    <div style="text-align:center">
                        <div class="binp">
                            <img class="photo" style="width:200px; height:200px" src="./style/cookie.jpg"/>
                            <?php 
                                if($theme ==='1'){
                                    ?>
                                    <input class="bu" type="button"  disabled="disabled" value="使用中">
                                    <?php
                                }
                                else{
                                    ?>
                                    <input class="bu" type="button"  value="烤餅乾"  @click="theme(1,item)">
                                    <?php
                                }
                                ?>
                        </div>
                        <div class="binp">
                            <img class="photo" style="width:200px;height:200px" src="./style/ETH.jpg"/>
                            <?php 
                                if($theme ==='2'){
                                    ?>
                                    <input class="bu" type="button"  disabled="disabled" value="使用中">
                                    <?php
                                }
                                else{
                                    ?>
                                    <input class="bu" type="button"  value="挖以太幣"  @click="theme(2,item)">
                                    <?php
                                }
                                ?>
                        </div>
                        <div class="binp">
                            <img class="photo" style="width:200px;height:200px" src="./style/word.jpg"/>
                            <?php 
                                if($theme ==='3'){
                                    ?>
                                    <input class="bu" type="button"  disabled="disabled" value="使用中">
                                    <?php
                                }
                                else{
                                    ?>
                                    <input class="bu" type="button"  value="寫論文"  @click="theme(3,item)">
                                    <?php
                                }
                                ?>
                        </div>
                        <input style="display:none" id = "id123" value = "<?php echo $id?>"/>
                        <input style="display:none" id = "pw123" value = "<?php echo $pw?>"/>
                    </div>
                </div>
                <div class="P" >
                    <?php echo '<img  src="data:image/png;base64,'.base64_encode($row[2]).'" />'?>
                </div>
                <div class="C count">
                    <?php echo $row[4]?>{{item.count}}<?php echo $row[5]?><br>
                    <input type="submit" class="button" value="<?php echo $row[6]?>" @click="handlePlus(item)" id="fire"/>
                </div><br><br>
                <div class="shop">
                    <h1>商店</h1>
                    <?php echo '<img  @load="handlePl4(item)" src="data:image/png;base64,'.base64_encode($row[3]).'" />'?>
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
                                    <strong><?php echo $row[7]?></strong><br>
                                    <small><?php echo $row[8]?></small>
                                </td>
                                <td class="am inter">{{item.inter}}<?php echo $row[9]?></td>
                                <td class="spend am">{{item.spend}}</td>
                                <td class="am">
                                    <?php if($count>=$spend){?>
                                        <button class="button2" @click="handlePl(item)" id="buttons">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </button>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <button class="button2" @click="handlePl(item)" disabled="disabled" id="buttons">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </button>
                                    <?php
                                        } 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="am">
                                    <strong><?php echo $row[10]?></strong><br>
                                    <small><?php echo $row[11]?></small>
                                </td>
                                <td class="am m">{{item.m}}<?php echo $row[12]?></td>
                                <td class="spend1 am">{{item.spend1}}</td>
                                <td class="am">
                                <?php if($count>=$spend){?>
                                    <button class="button2" @click="handlePl2(item)" disabled="disabled" id="buttons1">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <button class="button2" @click="handlePl2(item)" disabled="disabled" id="buttons1">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    <?php
                                        } 
                                    ?>
                                </td> 
                            </tr>
                            <tr>
                                <td class="am">
                                    <strong><?php echo $row[13]?></strong><br>
                                    <small><?php echo $row[14]?></small>
                                </td>
                                <td class="am mww">{{item.mww}}<?php echo $row[15]?></td>
                                <td class="spend2 am">{{item.spend2}}</td>
                                <td class="am">
                                <?php if($count>=$spend){?>
                                    <button class="button2" @click="handlePl3(item)" disabled="disabled" id="buttons2">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <button class="button2" @click="handlePl3(item)" disabled="disabled" id="buttons2">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    <?php
                                        } 
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body> 