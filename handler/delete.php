<?php
/**
 * Created by PhpStorm.
 * User: r0sev
 * Date: 2019/2/14
 * Time: 12:07
 */

if (empty($_GET['id'])){
    die('没有指定id!');
}

require_once 'conn.php';

$link = connectDB();

$id = intval($_GET['id']);

mysqli_query(
    $link,
    "DELETE FROM medicines WHERE id = $id"
);

if (mysqli_errno()){
    echo mysqli_error();
    die("数据库执行错误, In File: delete.php");
}else{
    header("Location:total.php");
}

