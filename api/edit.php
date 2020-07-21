<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
$data = [];

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $data = $db->find($id);

        switch ($table) {
            case "title":
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
                break;
            default:
                @$data['text'] = $_POST['text'][$key];
                @$data['sh'] =  in_array($id, $_POST['sh']) ? 1 : 0;
                break;
        }
    }
    // var_dump($data);
    $db->save($data);
}

to("../admin.php?do=$table");
