<?php
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];
    $uid=$_SESSION["id"];
    $conn=require_once("../Ly/config.php");
    $sql = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $data_nums1 = mysqli_num_rows($result); //統計總比數
    if(!isset($_GET["id"])){
        $id=$_SESSION["id"];
    }
    else{
        $id=$_GET["id"];
    }
    $sql = "SELECT * FROM purchase_history WHERE Buyer_id = '$id'"; //修改成你要的 SQL 語法
    $result = mysqli_query($conn,$sql) or die("Error");
    $data_nums = mysqli_num_rows($result); //統計總比數
    if($data_nums == "0"){
        $pages=1;
        $page=1;
        $yee="0";
    }
    else{
        $yee="1";
        $per = 5; //每頁顯示項目數量
        $pages = ceil($data_nums/$per);//取得不小於值的下一個整數
        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } 
        else{
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }
        $start = ($page-1)*$per; //每一頁開始的資料序號
        $result = mysqli_query($conn,$sql.' LIMIT '.$start.', '.$per) or die("Error");
    }
?>
<!DOCTYPE html>
<html style="background: #ffffff;color: #888888;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>已完成</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <style type="text/css">  /*彈跳視窗*/
        #light{
            display:none;
            position:absolute;
            top:25%;
            left:25%;
            width:50%;
            height:50%;
            padding:16px;
            border:3px solid black;
            background-color:#84ffdb;
            z-index:1002;
            overflow:auto;
        }
    </style>
    <script type="text/javascript">   /*彈跳視窗*/
        window.onload=function(){
            var linkbt=document.getElementById("linkbt");
            var light=document.getElementById('light');
            var closebt=document.getElementById("closebt");
            linkbt.onclick=function(){
                light.style.display='block';
            }
            closebt.onclick=function(){
                light.style.display='none';
            }
        }
    </script>
</head>

<body id="page-top" style="background: #ffffff;border-color: #ffffff;border-right-color: rgba(133,135,150,0);color: #ffffff;">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow mb-4 topbar static-top" style="background: #ffffff;border-color: #ffffff;width: 1920px;">
            <div class="container-fluid" style="background: #84ffdb">
                <a class="navbar-brand ms-md-7" href="../Ly/index.php" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
                    <img src="../assets/img/New%20Folder/w.jpg" style="width: 45px;height: 55px;vertical-align: text-bottom;" />果時</a>
            <form class="d-none d-sm-inline-block me-auto ms-md-1 my-2 my-md-0 mw-100 navbar-search1" action="../shop/search.php" method="post" id="clear-form">
                <div class="input-group" >
                    <input type="text" class="bg-light form-control border-0 small" placeholder="Search for ..." style="text-align: justify;border-style: dotted;" name="search" required/>
                    <button class="btn btn-primary py-0" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav flex-nowrap ms-auto" style="margin-right: 100px;width: auto;margin-top: -4px;">
                <li class="nav-item dropdown d-sm-none no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="me-auto navbar-search w-100">
                            <div class="input-group1">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="badge bg-danger badge-counter"></span>
                                <i class="fas fa-bell fa-fw">
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                            <h6 class="dropdown-header">訊息(massage)</h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                </div>
                                <div>
                                    <span class="small text-gray-500">December 12, 2019</span>
                                    <p>A new monthly report is ready to download!</p>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-success icon-circle">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="small text-gray-500">December 7, 2019</span>
                                    <p>$290.29 has been deposited into your account!</p>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-warning icon-circle">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="small text-gray-500">December 2, 2019</span>
                                    <p>Spending Alert: We&#39;ve noticed unusually high spending for your account.</p>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" href="../cart/cart.php">
                            <?php 
                                if($data_nums1=='0'){

                                }else{
                                ?>
                                <span class="badge bg-danger badge-counter">
                                    <?php
                                        echo $data_nums1;
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>
                            <i class="fas fa-shopping-basket fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                        </div>
                    </div>
                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                <?php echo $userName ?>
                            </span>
                            <?php
                                if($_SESSION["imageId"] == NULL){
                                    echo '<img class="border rounded-circle img-profile" src="../assets/img/New%20Folder/images.jpg"/>';
                                }else{
                                    echo '<img class="border rounded-circle img-profile" src="data:image/png;base64,'.base64_encode($_SESSION["imageId"]).'" />';
                                }
                            ?>
                        </a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="../setting/setting.php">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../assets/php/Logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div style="margin-top: -30px;color: rgba(255,255,255,255);"></div>
    <div class="flex">
        <input type="button" class="flex-child hover" name="alfabet" value="購物籃" onclick="location.href='../cart/cart.php'">
        <input type="button" class="flex-child" name="alfabet"  value="待出貨" onclick="location.href='../cart/cart-1.php'">
        <input type="button" class="flex-child" name="alfabet" value="已完成" disabled="disabled">
    </div>
    <div style="color: rgba(133,135,150,0);margin: 40px;"></div>
    <div>
        <div class="container">
            <div class="item_header">
                <div class="item_detail">商品</div>
                <div class="price">單價</div>
                <div class="count">數量(箱)</div> 
                <div class="amount">總計(元)</div>
                <div class="operate">紀錄</div>
            </div>
            <?php
                if($yee=="0"){
            ?>
            <div style='text-align:center; color:#696969; font-size: 50px;'>甚麼都沒有!!!</div>
            <?php
                }
                else{
                    while($row = mysqli_fetch_array($result)){
                        $count=$row[4];
                        $price=$row[5];
                        $sql = "SELECT commodity_name,commodity_seller_id,commodity_price,commodity_introduce_picture FROM commodity WHERE commodity_id = '$row[3]'";
                        $result1 = mysqli_query($conn,$sql) or die("Error");
                        $row1 = mysqli_fetch_array($result1);
                        $name=$row1[0];
                        $picture=$row1[3];
                        $com_price=$row1[2];
                        $sql1 = "SELECT user_Last_name,user_first_name,user_phone_number FROM user_information WHERE user_id = '$row1[1]'";
                        $result2 = mysqli_query($conn,$sql1) or die("Error");
                        $row2 = mysqli_fetch_array($result2);     
            ?>
            <div class="item_container" >
                <div class="item_header item_body">
                    <div class="item_detail">
                        <?php echo '<img class="prod_img" src="data:image/png;base64,'.base64_encode($picture).'" />';?>
                        <div class="name"><?php echo $name?></div>
                    </div>
                    <div class="price">
                        <span>$</span><?php echo $com_price;?>
                    </div>
                    <div class="count"><?php echo $count?></div> 
                    <div id = "<?php echo $row[3];?>" class="amount"><?php echo $price;?></div>
                    <div class="operate">
                        <button href="javascript:void(0)" id="linkbt">詳細資訊</button>
                    </div>
                </div> 
            </div>
            <div id="light">
                <div style="text-align:right;">
                    <button href="javascript:void(0)" id="closebt">x</button>
                </div>
                <div class="mb-3">
                    <ul style="color: rgb(0, 0, 0);">
                        <li>
                            <div id="" >
                                訂單編號：<?php echo $row[1];?>
                            </div>
                        </li> 
                        <li>
                            <div id="name" >
                                賣家姓名：<?php echo $row2[1].$row2[0];?>
                            </div>
                        </li>
                        <li>
                            <div id="name" >
                                賣家電話：0<?php echo $row2[2];?>
                            </div>
                        </li>   
                        <li>
                            <div id="name" >
                                買家姓名：<?php echo $row[7];?>
                            </div>
                        </li>
                        <li>
                            <div id="phone" >
                                買家電話：0<?php echo $row[8];?>
                            </div>
                        </li>
                        <li>
                            <div id="phone" >
                                地址：<?php echo $row[9];?>
                            </div>
                        </li>
                        <li>
                            <div>
                                訂單成立時間：<?php echo $row[10];?>
                            </div>
                        </li>
                        <li>
                            <div>
                                訂單出貨時間：<?php echo $row[11];?>
                            </div>
                        </li>
                        <li>
                            <div>
                                訂單到貨時間：<?php echo $row[12];?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<div>
    <div style="text-align:center; color:#696969;">
        <?php
        //分頁頁碼
        echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';
        echo "<br /><a href=?page=1&id=$id>首頁</a> ";
        echo "第 ";
        for( $i=1 ; $i<=$pages ; $i++ ) {
            if( $page-3 < $i && $i < $page+3 ) {
                echo "<a href=?page=".$i."&id=$id>".$i."</a> ";
            }
        } 
        echo " 頁 <a href=?page=".$pages."&id=$id>末頁</a><br/><br/>";
        ?>
    </div>
</div>
<?php
    }
?>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/vue.js"></script>
</body>
</html>