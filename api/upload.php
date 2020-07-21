<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
$data = [];

move_uploaded_file($_FILES['name']['tmp_name'], "../img/" . $filename);
$data['name'] = $_FILES['name']['name'];
$data['id'] = $_POST['id'];


$db->save($data);

to("../admin.php?do=$table");
