<h3>新增最新消息資料</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料：</td>
            <td><textarea name="text" cols="60" rows="5"></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
    <input type="submit" value="新增"><input type="reset" value="重置">
</form>