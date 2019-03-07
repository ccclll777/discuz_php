
<?php
session_start();
$username= $_GET['user_name'];

$id = @mysqli_connect("localhost:3306", "root", "SSwns304275", "bbs_data") or die("无法连接到服务器");


$check__query2 = "select * from article_info  where user_name='$username'";

$result2 = mysqli_query($id, $check__query2);
$num2 = mysqli_num_rows($result2);
$check__query3 = "select * from filecomment where user_name='$username'";

$result3 = mysqli_query($id, $check__query3);
$num3 = mysqli_num_rows($result3);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head bgcolor="#d0d0d0">

    <title>与我相关</title>

    <link href="css/indexcheck.css"rel="stylesheet">

    <script src="data/cache/forum.js?wXk" type="text/javascript"></script>
    <script type="text/javascript">
        function altRows(id){
            if(document.getElementsByTagName){

                var table = document.getElementById(id);
                var rows = table.getElementsByTagName("tr");

                for(i = 0; i < rows.length; i++){
                    if(i % 2 == 0){
                        rows[i].className = "evenrowcolor";
                    }else{
                        rows[i].className = "oddrowcolor";
                    }
                }
            }
        }

        window.onload=function(){
            altRows('alternatecolor');
        }
    </script>
</head>

<body id="nv_forum" class="pg_forumdisplay"background="img/houndstooth-pattern.png">
<div class="head">

    <div class="sdu" style="font-size: 18px;display: inline-block;"> <a class="vintage1" href="#" style="color: black;">山东大学学生论坛</a></div>
    <div class="tab">
        <a href="indexcheck.php" class="direct ">首页</a>
        <a href="#" class="direct ">本科交流</a>
        <a href="#" class="direct ddd" id="link">研究生交流</a>
        <a href="#" class="direct ">校内新闻</a>
        <a href="#" class="direct">问答</a>
        <?php
        if(isset($_SESSION['username']))
        {

            $href1 = "personal.php?user_name=".$_SESSION['username'];
            echo "<a href=$href1" ;



            ?>
            class="direct" >个人信息</a>
            <?php
        }
        else
        {
            echo " <a href=\"#\" class=\"direct\">个人信息</a></a>";

        }
        ?>

        <a href="#" class="direct">与我相关</a>
    </div>
    <?php
    if(isset($_SESSION ['username'])){
        ?>


        <div class="log">
            <button class="sign" value="写博客" style="color: #4586f3 ;" onclick="window.location.href='writefile.php' ">我要发帖</button>
            <button class="sign" value="退出登录" style="color: #4586f3 ;" onclick="window.location.href='logout.php' ">退出登录</button>


        </div>

    <?php }
    else{
        ?>
        <div class="log">
            <button class="sign" value="登陆" style="color: #4586f3 ;" onclick="window.location.href='login.html' ">登陆</button>
            <button class="sign" value="注册" style="color: #4586f3;" onclick="window.location.href='register.html'">注册</button>
        </div>
        <?php
    }
    ?>

</div>


<div style="text-align: center">

    <p class="vintage3"style="text-align: center;font-size: 30px;">我的帖子</p>
</div>
<div class="mainBody">

    <table class="altrowstable" id="alternatecolor" width="100%">
        <thead>
        <tr>

            <th width="10%">讨论区</th>
            <th width="10%">标题</th>
            <th width="10%">发帖日期</th>
            <th width="50%">帖子</th>
            <th width="20%">操作</th>
        </tr>
        </thead>
        <tbody id="mybody"
        <?php
            if($num2)
            {


        while($row2 = mysqli_fetch_array($result2))
        {
            $href = "showarticles.php?id=". $row2['id'] ;
            $href2 = "deletearticle.php?id=".$row2['id'];
            echo "<tr>";
            echo " <td width=\"10%\" style=\" text-align:center;\"class=\"titleTd\">
                <a id=\"title_1\" href=$href style=\" text-align:center;\"></a>" . $row2['group1'] . "</td>";
            echo "<td width=\"10%\"style=\" text-align:center;\" class=\"authorTd\"><a id=\"author_1\" href=$href style=\" text-align:center;\"></a>" . $row2['title'] . "</td>";
            echo "<td width=\"10%\" style=\" text-align:center;\" class=\"dateTd\"><a id=\"date_1\" href=$href style=\" text-align:center;\"></a>" . $row2['now'] . "</td>";
            echo "<td width=\"50%\"style=\" text-align:center;\" class=\"scanTd\"><a id=\"scan_1\" href=$href style=\" text-align:center;\"></a>" . $row2['content'] . "</td>";

            echo "<td width=\"20%\"style=\" text-align:center;\" class=\"saveTd\"> <button class=\"sign\" value=\"删除\" style=\"color: #4586f3 ;\" onclick=\"window.location.href='$href2' \">删除
            </button></td>";
            echo "</tr>";

        }
        echo " </tbody>";
        echo "</tbody>";
            }
            else
            {
        ?>

                <table id="tb">

                    <tr >

                        <td colspan="5"height="50"style="text-align: center">当前没有任何评论</td>

                    </tr>

                </table>
                <?php
            }
        ?>



</div>



<div class="mainBody">


    <table class="altrowstable" id="alternatecolor" width="100%">
        <thead>
        <tr>

            <th width="10%">讨论区</th>
            <th width="10%">帖子标题</th>
            <th width="30%">帖子内容</th>
            <th width="10%">发帖人</th>
            <th width="20%">评论内容</th>
            <th width="20%">操作</th>
        </tr>
        </thead>
        <div style="text-align: center">
            <p class="vintage3"style="text-align: center;font-size: 30px;"> 我的评论</p>

        </div>
        <tbody id="mybody"


        <?php
        if($num3) {


            while ($row3 = mysqli_fetch_array($result3)) {

                $href3 = "delete_file.php?id=" . $row3['id'];
                echo "<tr>";
                echo " <td width=\"10%\" style=\" text-align:center;\"class=\"titleTd\">
                <a id=\"title_1\"  style=\" text-align:center;\">" . $row3['group1'] . "</a></td>";
                echo "<td width=\"10%\"style=\" text-align:center;\" class=\"authorTd\"><a id=\"author_1\" style=\" text-align:center;\">" . $row3['article_title'] . "</a></td>";
                echo "<td width=\"30%\" style=\" text-align:center;\" class=\"dateTd\"><a id=\"date_1\"  style=\" text-align:center;\"></a>" . $row3['article'] . "</td>";
                echo "<td width=\"10%\"style=\" text-align:center;\" class=\"scanTd\"><a id=\"scan_1\"  style=\" text-align:center;\"></a>" . $row3['article_user'] . "</td>";
                echo "<td width=\"20%\"style=\" text-align:center;\" class=\"saveTd\"><a id=\"save_1\"  style=\" text-align:center;\"></a>" . $row3['file_content'] . "</td>";
                echo "<td width=\"20%\"style=\" text-align:center;\" class=\"saveTd\"> <button class=\"sign\" value=\"删除\" style=\"color: #4586f3 ;\" onclick=\"window.location.href='$href3' \">删除
            </button></td>";
                echo "</tr>";

            }
            echo "</tbody>";
            echo " </table>";
        }
        else{
        ?>


    <table id="tb">

        <tr >

            <td colspan="6"height="50"style="text-align: center">当前没有任何评论</td>

        </tr>

    </table>
    <?php
    }
    ?>

</div>


</body>
</html>
