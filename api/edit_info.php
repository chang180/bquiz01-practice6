<?php
include_once "../base.php";
$table = $_POST['table'];

switch($table){
    case "total":
        $total['total']=$_POST['total'];
        $Total->save($total);
    break;
    case "bottom":
        $bottom['bottom']=$_POST['bottom'];
        $Bottom->save($bottom);
    break;
}

to("../admin.php?do=$table");
