<!--
/**
 * Created by PhpStorm.
 * User: r0sev
 * Date: 2019/2/13
 * Time: 10:58
 */
-->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>小系统</title>
    </head>

    <body>

        <?php
            //判断添加是否合法：

//            if (!isset($_POST['name'])){
//                die('药物名称未填写！');
//            }
//            if (!isset($_POST['sci_name'])){
//                die('药物学名未填写！');
//            }
//            if (!isset($_POST['symptom'])){
//                die('药物疗效未填写！');
//            }
//            if (!isset($_POST['price'])){
//                die('药物价格未填写！');
//            }
//            if (!isset($_POST['loc'])){
//                die('药物位置未填写！');
//            }

            if (empty($_POST['name'])){
                die('药物名称未填写！');
            }
            if (empty($_POST['sci_name'])){
                die('药物学名未填写！');
            }
            if (empty($_POST['symptom'])){
                die('药物疗效未填写！');
            }
            if (empty($_POST['price'])){
                die('药物价格未填写！');
            }
            if (empty($_POST['loc'])){
                die('药物位置未填写！');
            }
            if (empty($_POST['remain'])){
                die('药物剩余未填写！');
            }


            $name = $_POST['name'];
            $sci_name = $_POST['sci_name'];
            $symptom = $_POST['symptom'];
            $price = $_POST['price'];
            $price = doubleval($price);             //防止sql注入
            $location = $_POST['loc'];
            $remain = $_POST['remain'];
            $remain = intval($remain);


            if (isset($_POST['producer'])){
                $producer = $_POST['producer'];
            }else{
                $producer = 'none';
            }

            if (isset($_POST['discount'])){
                $discount = $_POST['discount'];
                $discount = doubleval($discount);
            }else{
                $discount = 0;
                $discount = doubleval($discount);
            }

            if (isset($_POST['rank'])){
                $rank = $_POST['rank'];
                $rank = intval($rank);
            }else{
                $rank = 0;
                $rank = intval($rank);
            }

            require_once 'conn.php';

            //连接数据库
            $conn = connectDB();
            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            if ($conn){
                //echo '连接数据库成功<br>';
                /**
                 * 执行查询 : 查询所有数据
                 */
                $result = mysqli_query(
                    $conn,
                    "INSERT INTO medicines(`id`, `name`, `sci_name`, `type`, `producer`, `price`, `discount`, `rank`, `location`, `remain`) VALUES ('','$name','$sci_name','$symptom','$producer',$price,$discount,$rank,'$location',$remain)"
                );

                //如果出错：
                if (mysqli_errno()){
                    echo mysqli_error();
                }else{
                    //echo 'nihao';
                    /**
                     * 释放数据库
                     */
                    mysqli_close($conn);
                    //header("Location:total.php");
                    echo '<p>插入数据成功!</p>';
                    echo '<p><a href="../add.html">点击返回</a></p>';
                    echo '<p><a href="total.php">查看插入结果</a></p>';
                }


            }else {
                echo '连接数据库失败<br>';
            }
        ?>

    </body>

</html>

