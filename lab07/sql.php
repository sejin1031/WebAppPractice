<?php $name = new PDO("dbprogram:database;host=server",root,tpwls1294~);
    $rows = $name->query("select name from student where student_id like %'2007'%");
    ?>
    <ul>
    <php? foreach($rows as $row){ ?>
    <li>name : <?= $row["name"] ?>
    <php? } ?>
    