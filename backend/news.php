<?php
$table = $_GET['do'];
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="65%">最新消息資料內容</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                $db=new DB($table);
                $total=$db->count();
                $div=4;
                $pages=ceil($total/$div);
                $now=$_GET['p']??"1";
                $start=($now-1)*$div;
                $prev=(($now-1)>0)?($now-1):$now;
                $next=(($now+1)<=$pages)?($now+1):$now;
                $rows = $db->all([]," LIMIT $start, $div ");

                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><textarea name="text[]" cols="60" rows="5"><?= $row['text']; ?></textarea></td>
                        <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </tr>
                <?php } ?>
            </tbody>
            <input type="hidden" name="table" value="<?= $table; ?>">
        </table>
        <?php
    echo "<a href='?do=$table&p=$prev' style='text-decoration:none'> < </a>";
for($i=1;$i<=$pages;$i++){
$fontsize=($now==$i)?"30px":"20px";
echo "<a href='?do=$table&p=$i' style='text-decoration:none;font-size:$fontsize'> $i </a>";
}
echo "<a href='?do=$table&p=$next' style='text-decoration:none'> > </a>";


?>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?= $table; ?>.php?do=<?= $table; ?>')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>