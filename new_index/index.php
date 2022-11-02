<?php
// 初始化
session_start();
// 檢查用戶是否已經登錄，如果是，則將他重定向到首頁 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //設定首頁
    if(isset($_SESSION["html"]) && $_SESSION["html"] === true)
    {
        include("function/setting.php");
        include("page_element/top_page.php");
        include("page_element/head/log_head.php");
        include("page_element/body/log_body.php");
        include("function/button_function.php");
        include("page_element/bottom_page.php");
    }
    else
    {
        include("page_element/top_page.php");
        include("page_element/head/unlog_head.php");
        include("page_element/body/unlog_body.php");
        include("function/unlog_button_function.php");
        include("page_element/bottom_page.php");
    }  
}
else
{
    include("page_element/top_page.php");
    include("page_element/head/unlog_head.php");
    include("page_element/body/unlog_body.php");
    include("function/unlog_button_function.php");
    include("page_element/bottom_page.php");;
}
$_SESSION = array(); 
session_destroy();
?>