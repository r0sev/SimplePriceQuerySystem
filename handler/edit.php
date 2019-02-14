<!DOCTYPE html>

<html>

    <head>
        <title>小系统</title>
        <meta charset="UTF-8">
    </head>

    <body>


        <?php
        /**
         * Created by PhpStorm.
         * User: r0sev
         * Date: 2019/2/14
         * Time: 00:35
         */


        require_once 'conn.php';

        if (!empty($_GET['id'])){

            $link = connectDB();

            $id = intval($_GET['id']);

            $result = mysqli_query(
                $link,
                "SELECT * FROM medicines WHERE id = $id"
            );

            if (mysqli_errno()){
                die('数据库连接出错, In File: "edit.php"');
            }

            $arr = mysqli_fetch_assoc($result);

            //print_r($arr);

        }else{
            die('没有键入id!');
        }

        ?>

        <h2>修改信息</h2>
        <form action="confirm_modify.php" method="post">

            <div>药品编号       : <input type="text" name="id" readonly="readonly" value="<?php echo $arr['id'] ?>"></div>
            <div>药品名称       : <input type="text" name="name" value="<?php echo $arr['name'] ?>"> *</div>
            <div>药品学名       : <input type="text" name="sci_name" value="<?php echo $arr['sci_name'] ?>"> *</div>
            <div>药品作用       : <input type="text" name="symptom" value="<?php echo $arr['type'] ?>"> *</div>
            <div>药品厂商       : <input type="text" name="producer" value="<?php echo $arr['producer'] ?>"></div>
            <div>药品价格       : <input type="text" name="price" value="<?php echo $arr['price'] ?>"> *</div>
            <div>药品收取       : <input type="text" name="discount" value="<?php echo $arr['discount'] ?>"></div>
            <div>药品效果       : <input type="text" name="rank" value="<?php echo $arr['rank'] ?>"></div>
            <div>药品位置       : <input type="text" name="loc" value="<?php echo $arr['location'] ?>"> *</div>
            <div>药品剩余       : <input type="text" name="remain" value="<?php echo $arr['remain'] ?>"> *</div>
            <br />
            <div><input type="submit" value="确定"> <a href="../index.html">放弃修改</a> </div>
        </form>


    </body>

</html>