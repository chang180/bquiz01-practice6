<?php
$table = $_GET['do'];
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="api/edit_info.php">
        <table width="100%">
            <tbody>
                <tr>
                    <td  class="yel" width="50%">頁尾版權資料：</td>
                    <td width="50%"><input type="text" name="bottom" value="<?=$bottom['bottom'];?>"></td>
                </tr>
            </tbody>
            <input type="hidden" name="table" value="<?= $table; ?>">
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>