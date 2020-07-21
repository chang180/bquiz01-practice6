<?php
include_once "../base.php";
$table = $_POST['table'];
$parent=$_POST['parent'];
$db = new DB($table);

$data = [];

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        echo $id;
        $db->del($id);
    } else {
        $data = $db->find($id);

                $data['name'] = $_POST['name'][$key];
                $data['text'] = $_POST['text'][$key];
                $data['parent']=$parent;
                $data['sh'] = 1;
    }
    $db->save($data);
}

if(!empty($_POST['name2'])){
    foreach($_POST['name2'] as $key=>$name){
        $new['name'] = $name;
        $new['text'] = $_POST['text2'][$key];
        $new['parent']=$parent;
        $new['sh'] = 1;
        // var_dump($new);
        $db->save($new);
}
}

to("../admin.php?do=$table");
