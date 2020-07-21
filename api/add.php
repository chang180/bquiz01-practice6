<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
$data = [];

if (!empty($_FILES['name']['tmp_name'])) {
    $filename = $_FILES['name']['name'];
    move_uploaded_file($_FILES['name']['tmp_name'], "../img/" . $filename);
    $data['name'] = $filename;
}

switch ($table) {
    case "title":
        $data['text'] = $_POST['text'];
        $data['sh'] = 0;
        break;
    case "admin":
        $data['acc'] = $_POST['acc'];
        $data['pw'] = $_POST['pw'];
        break;
    case "menu":
        $data['name'] = $_POST['name'];
        $data['text'] = $_POST['text'];
        $data['sh'] = 1;
        break;
    default:
        $data['text'] = $_POST['text'];
        $data['sh'] = 1;
        break;
}
// var_dump($data);
$db->save($data);

to("../admin.php?do=$table");
