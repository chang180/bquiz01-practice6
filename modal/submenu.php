<h3>編輯次選單</h3>
<hr>
<form action="api/submenu.php" method="post" enctype="multipart/form-data">
    <table id="more">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        include_once "../base.php";
        $table = $_GET['do'];
        $db = new DB($table);
        $rows = $db->all(['parent' => $_GET['parent']]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><input type="text" name="name[]" value="<?= $row['name']; ?>"></td>
                <td><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
        <?php } ?>
    </table>
    <input type="hidden" name="parent" value="<?= $_GET['parent']; ?>">
    <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="新增次選單" onclick="moreSub()">
</form>
<script>
    function moreSub() {
        let el = `
    <tr>
            <td><input type="text" name="name2[]"></td>
            <td><input type="text" name="text2[]"></td>
            <td></td>
        </tr>
    `;
        $("#more").append(el);
    }
</script>