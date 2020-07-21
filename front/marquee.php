<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?php
    $rows = $Ad->all();
    foreach ($rows as $row) echo $row['text'], "&nbsp;","&nbsp;", "&nbsp;", "&nbsp;";
    ?>
</marquee>