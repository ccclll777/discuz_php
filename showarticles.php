<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查看内容</title>

    <link type="text/css" rel="stylesheet" href="js/bootstrap-3.3.5-dist/dist/css/bootstrap.css">
    <link href="js/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/showarticles.css">
    <script src="vue.js"></script>



</head>
<body background="img/houndstooth-pattern.png">
<div id="app">

<nav class="top_bar navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: black;">山东大学学生论坛</a>
        <ul class="nav navbar-nav navbar-left">
            <li><a id="writeGo" href="#"><span class="glyphicon glyphicon-edit" style="color: black;font-size: 14px"
                                               onclick="window.location.href='indexcheck.php'">返回主页</span></a></li>
        </ul>

    </div>
</nav>

<?php
$id2 = $_GET['id'];
$id = @mysqli_connect("localhost:3306", "root", "SSwns304275", "bbs_data") or die("无法连接到服务器");
$check__query = "select * from article_info  where id='$id2'";

$result = mysqli_query($id, $check__query);
$row = mysqli_fetch_array($result);
?>
<div class="content">
    <div class="container-fluid">
        <div style="text-align: center">

            <p class="vintage3"style="text-align: center;font-size: 30px">博客文章</p>
        </div>

        <table id="tb">
            <tr>
                <th>发帖人：</th>
                <th><?php echo $row['user_name']; ?></th>
                <th>发帖时间：</th>
                <th><?php echo $row['now']; ?></th>
            </tr>
            <tr>
                <th>发帖板块：</th>
                <th><?php echo $row['group1']; ?></th>
                <th>标题：</th>
                <th><?php echo $row['title']; ?></th>
            </tr>
            <tr >
                <td height="150">帖子内容</td>
                <td colspan="3"height="150"><?php echo $row['content']; ?></td>

            </tr>

        </table>
    </div>
</div>

<?php

$check__query2 = "select * from filecomment where article_id=' $id2'";

$result2 = mysqli_query($id, $check__query2);
$num = mysqli_num_rows($result2);
?>

<div class="content">
    <div class="container-fluid">
        <div style="text-align: center">

            <p class="vintage3"style="text-align: center;font-size: 30px;">查看相关评论</p>
        </div>


        <?php
        if($num)
        {
            while ($row = mysqli_fetch_array($result2)) {
                echo "<table id=\"tb\">";
                echo " <tr>";
                echo "  <th>评论用户：</th>";
                echo " <th>".$row['user_name'] ."</th>";
                echo " <th>评论时间：</th>";
                echo " <th>".$row['datetime']."</th>";
                echo " </tr>";
                echo " <tr >";
                echo " <td height=\"100\">评论内容</td>";
                echo " <td colspan=\"3\"height=\"100\">".$row['file_content']."</td>";
                echo " </tr>";
                echo "</table>";
            }
        }
        else{
            ?>
        <table id="tb">

            <tr >

                <td colspan="4"height="50"style="background-color: #0094ff">当前没有任何评论</td>

            </tr>

        </table>
    <?php
        }
    ?>



    </div>
</div>
<form method="post" action="post_file.php">
    <div class="container-fluid">
        <div class="row">
            <div id="head">
                <div>
                    <h1 id="title" class="text-left"></h1>
                    <div>
                        <a><span id="favor" class="myheart"></span></a>

                    </div>
                </div>
                <div id="author" class="text-right"></div>
                <div id="date" class="text-right"></div>
                <hr>

            </div>

            <div id="mainBody">
                <div id="content"></div>
            </div>




            <div id="comment">
                <label  class="vintage3" style="font-size: 18px;background-color: #0f0f0f">评论:</label>
                <hr>
                <textarea class="form-control" type="text" id="comment_main" rows="6" name="file_content" style="font-size: 14px"placeholder="说点什么吧..."></textarea>
                <?php
                $article_id = "$id2";
                echo " <input type=\"hidden\" id = \"btn_login\" name=\"file_id\" value=\" $article_id\">"
                ?>

                <button id="myButton"  type="Submit"name="Submit"class="btn btn-default"value="提交" >提交</button>
            </div>

            <hr>
            <hr>


            <div id="showComment"></div>
        </div>
    </div>
</form>

</div>

</body>
<script>
    new Vue({
        el:'#app',
        data:{

            name:'1234'
        },


    });
</script>
</html>
