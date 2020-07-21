<h3>更新圖片</h3>
<hr>
<form action="api/upload_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="name"></td>
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        </tr>
    </table>
    <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
    <input type="submit" value="確定修改"><input type="reset" value="重置">
</form>