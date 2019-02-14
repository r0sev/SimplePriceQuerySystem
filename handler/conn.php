<?php
/**
 * Created by PhpStorm.
 * User: r0sev
 * Date: 2019/2/13
 * Time: 11:26
 */

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'store');
define('MYSQL_PORT', '8889');

function connectDB(){
//    $link = mysqli_init();
//    $handler = mysqli_real_connect(
//        $link,
//        MYSQL_HOST,
//        MYSQL_USER,
//        MYSQL_PASSWORD,
//        MYSQL_DB,
//        MYSQL_PORT
//    );
//    return $handler;

    $link = mysqli_connect(
        MYSQL_HOST,
        MYSQL_USER,
        MYSQL_PASSWORD,
        MYSQL_DB,
        MYSQL_PORT
    );

    return $link;
}