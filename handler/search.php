<!--
/**
 * Created by PhpStorm.
 * User: r0sev
 * Date: 2019/2/13
 * Time: 10:58
 */
-->
<?php
    require_once 'conn.php'
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>小系统</title>
    </head>

    <body>

        <?php


            if (isset($_POST['choice'])) {
                $choice = $_POST['choice'];
            }else{
                $choice = 1;
            }

            $choice = intval($choice);

            if (empty($_POST['user_input'])){
                echo '没有输入数据！请'.'<a href="../search.html">返回</a>';
                die();
            }

            $name = $_POST['user_input'];
            //连接数据库
            $conn = connectDB();

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }


            if ($conn){
                //echo '连接数据库成功<br>';

                if ($choice == 1){
                    $result = mysqli_query(
                        $conn,
                        "SELECT * FROM medicines WHERE name='$name'"
                    );
                    //echo "到了choice==1分支";
                }elseif($choice == 2){
                    $result = mysqli_query(
                        $conn,
                        "SELECT * FROM medicines WHERE sci_name='$name'"
                    );
                }elseif($choice == 3){
                    echo '功能尚未完善，敬请期待...';
                    echo '请'.'<a href="../search.html">返回</a>';
                    die();
                }

                $rows = mysqli_num_rows($result);    //总行数

                echo "<table style='text-align: left;' width='100%' border='1'>  
                <tr> 
                <th>id</th> 
                <th>药品名</th> 
                <th>学名</th> 
                <th>治疗</th> 
                <th>厂商</th> 
                <th>价格</th> 
                <th>收取</th> 
                <th>推荐度</th> 
                <th>位置</th> 
                <th>剩余</th>
                <th>修改</th>
                </tr>";

                for ($i = 0; $i < $rows; $i++){
                    $result_arr = mysqli_fetch_assoc($result);

                    $id = $result_arr['id'];
                    $name = $result_arr['name'];
                    $sci_name = $result_arr['sci_name'];
                    $type = $result_arr['type'];
                    $producer = $result_arr['producer'];
                    $price = $result_arr['price'];
                    $sell_price = $result_arr['discount'];
                    $rank = $result_arr['rank'];
                    $loc = $result_arr['location'];
                    $remain = $result_arr['remain'];


                    echo "<tr> 
                        <th>$id</th> 
                        <th>$name</th> 
                        <th>$sci_name</th> 
                        <th>$type</th> 
                        <th>$producer</th> 
                        <th>$price</th> 
                        <th>$sell_price</th> 
                        <th>$rank</th> 
                        <th>$loc</th> 
                        <th>$remain</th>
                        <th><a href='edit.php?id=$id'>修改</a> <a href='delete.php?id=$id'>删除</a></th>     
                    </tr>";

                }

                echo "</table>";

                /**
                 * 释放数据库
                 */
                mysqli_close($conn);
            }else {
                echo '连接数据库失败<br>';
            }
        ?>

        <p><a href="../index.html" >返回首页</a></p>

    </body>

</html>

