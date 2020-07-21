<?php
include_once "../base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$chk=$Admin->count(['acc'=>$acc,'pw'=>$pw]);

if($chk>0){
    to("../admin.php?do=title");
}else{
    // to("../index.php?do=login");
    echo "<script>alert('帳號或密碼錯誤');
    location.href='../index.php?do=login';
    </script>";
}

