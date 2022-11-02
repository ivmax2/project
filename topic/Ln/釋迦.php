<?php
    $conn=require_once("../Ly/config.php");
    $id=$_GET["id"];
    $sql = "SELECT * FROM commodity WHERE commodity_type = '$id'"; //修改成你要的 SQL 語法
    $result = mysqli_query($conn,$sql) or die("Error");

    $data_nums = mysqli_num_rows($result); //統計總比數
    if($data_nums == "0"){
        echo "<script>alert('目前沒有此商品');
     window.location.href='first.html';
    </script>";
    }
    else{
        $per = 5; //每頁顯示項目數量
        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
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
<html style="background:#ffffff;border-color: #ffffff;color: #ffffff;height: 100%;width:100%">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>fruit_page</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <link rel="stylesheet" href="../assets/css/commodity.css">
    <link rel="stylesheet" href="../assets/css/shop_page.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
    <style>
        .prod_img{
            font: 13px/1.2 Arial,Verdana,'Microsoft JhengHei',Helvetica,sans-serif;
            word-break: break-all;
            box-sizing: border-box;
            border: 0;
            outline: 0;
            vertical-align: baseline;
            color: #06c;
            text-decoration: none;
            padding: 0;
            font-size: 100%;
            display: block;
            margin: 0 auto;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            width: 120px;
            height: 120px;
            position: relative;
            }
    </style>
</head>

<body id="page-top" style="background: #ffffff;border-color: #ffffff;border-right-color: rgba(133,135,150,0);color: #ffffff;">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow topbar static-top" style="background: #84ffdb;border-color: #84ffdb;width: 1920px;">
            <div class="container-fluid "style="background: #84ffdb">
                <a class="navbar-brand ms-md-7" href="../Ln/first.html" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
                    <img src="../assets/img/New%20Folder/w.jpg"style="width: 45px;height: 55px;vertical-align: text-bottom;" />果時</a>
                <form class="d-none d-sm-inline-block me-auto ms-md-1 my-2 my-md-0 mw-100 navbar-search1" action="search.php" method="post" id="clear-form">
                    <div class="input-group" >
                        <input type="text" class="bg-light form-control border-0 small" placeholder="Search for ..." style="text-align: justify;border-style: dotted;" name="search" required />
                        <button class="btn btn-primary py-0" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav flex-nowrap ms-auto" style="margin-right: 100px;width: auto;margin-top: -4px;">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"  href="../admin/login.html" disabled="disabled">
                            <i class="fas fa-bell fa-fw"></i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false"  href="../admin/login.html" disabled="disabled">
                                <i class="fas fa-shopping-basket fa-fw"></i>
                            </a>
                        </div>
                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                    </li>
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" href="../admin/login.html">
                                <span class="d-none d-lg-inline me-2 text-gray-600 small">登入帳號</span>
                                <img class="border rounded-circle img-profile" src="../assets/img/New%20Folder/images.jpg" />
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<div style="color: rgba(133,135,150,0);margin: 10px;"></div>
<?php
    //輸出資料內容
    while ($row = mysqli_fetch_array($result))
    {
        $name=$row['commodity_name'];
        $price=$row['commodity_price'];
        $introduce=$row['commodity_introduce'];
        $picture=$row['commodity_introduce_picture'];
        $com_id=$row['commodity_id'];
        #data:image/png;base64,'.base64_encode($_SESSION["imageId"]).' 
    ?>
    <div id="commodity_page" class = "container1">
            <dl class="col3f">
                <dd class="c1f">
                    <a class="prod_img" href="goods.php?id=<?php echo $com_id?>">
                        <?php echo '<img src="data:image/png;base64,'.base64_encode($picture).'" />';?>
                    </a>
                </dd>
                <dd class="c2f">
                    <ul class="tag_box"></ul>
                    <h5 class="prod_name">
                        <a href="goods.php?id=<?php echo $com_id?>"><?php echo $name?></a>
                    </h5>
                    <span class="nick"><?php echo $introduce?></span>
                    <ul id="bookInfo"></ul>
                </dd>
                <dd class="c3f">
                    <ul class="tag_box"></ul>
                    <ul class="tag_box"></ul>
                    <ul class="price_box">一箱
                        <span>$
                            <span><?php echo $price?></span>
                        </span>
                    </ul>
                    <ul>
                        <form action="../admin/login.html" method="post" enctype="multipart/form-data">
                            <button type="submit" style="display: inline-block;" name="join" >加入購物車</button>
                        </from>
                        <button type="button"  onclick="location.href='goods.php?id=<?php echo $com_id?>'" style="display: inline-block;">商品介紹</button>
                    </ul>
                </dd>
            </dl>
    </div>
    <?php 
    }
    ?>
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
</body>
</html>