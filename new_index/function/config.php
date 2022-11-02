<?php
  $db_address = '127.0.0.1:3306';
  $db_username = 'user';
  $db_password = 'aaaa1111';
  $db_name = 'cookie';
  $link=@mysqli_connect($db_address,$db_username,$db_password);
  //	mysqli_query($db_link,"SET NAMES utf-8");  //設定字元集與編碼為utf-8
	if(!$link){
		//die("資料庫連線失敗<br>");
	}else{
		//echo"資料庫連線成功<br>";
	}
	$seldb=@mysqli_select_db($link,$db_name);
	if(!$seldb){
		//die("資料庫選擇失敗<br>");
	}else{
		//echo"資料庫選擇成功<br>";
        return $link;
	}
?>