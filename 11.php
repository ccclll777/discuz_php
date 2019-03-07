<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>论坛主页</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css">
    <link href="css/indexcheck.css"rel="stylesheet">
    <script type="text/php" src="indexcheck.php"></script>
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
    <script src="vue.js"></script>

</head>
<body>
<div id="app">
    <div class="head">

        <div class="sdu" style="font-size: 18px;display: inline-block;"> <a class="vintage1" href="#" style="color: black;">山东大学学生论坛</a></div>
        <div class="tab">
            <a href="#" class="direct ">首页</a>
            <a href="#" class="direct ">本科交流</a>
            <a href="#" class="direct ddd" id="link">研究生交流</a>
            <a href="#" class="direct ">校内新闻</a>
            <a href="#" class="direct">问答</a>
            <a href="#" class="direct">个人信息</a>
            <a href="#" class="direct">关于我们</a>
        </div>
        <?php
        if(isset($_SESSION ['username'])){
            ?>


            <div class="log">
                <button class="sign" value="写博客" style="color: #4586f3 ;" onclick="window.location.href='writefile.php' ">我要发帖
                </button>
                <button class="sign" value="退出登录" style="color: #4586f3 ;" onclick="window.location.href='logout.php' ">退出登录</button>


            </div>

        <?php }
        else{
            ?>
            <div class="log">
                <button class="sign" value="登陆" style="color: #4586f3 ;" onclick="window.location.href='login.html' ">登陆
                </button>
                <button class="sign" value="注册" style="color: #4586f3;" onclick="window.location.href='register.html'">注册
                </button>
            </div>
            <?php
        }
        ?>

    </div>

    <div id="demo">
        <table border="0" align="left" cellpadding="0" cellspacing="0" cellspace="0">
            <tr>
                <td height="85" valign="top" id="demo1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><a href="#"><img src="img/first.png" width="427" height="400" border="0"></a></td>
                            <td><a href="#"><img src="img/second.png" width="427" height="400" border="0"></a></td>
                            <td><a href="#"><img src="img/third.png" width="427" height="400" border="0"></a></td>

                        </tr>
                    </table>
                </td>
                <td id="demo2" valign="top"></td>
            </tr>
        </table>
    </div>


    <div class="mainBody">

        <table class="altrowstable" id="alternatecolor" width="100%">
            <thead>
            <tr>
                <th width="10%">帖子编号</th>
                <th width="10%">讨论区</th>
                <th width="10%">标题</th>
                <th width="10%">发帖日期</th>
                <th width="50%">帖子</th>
                <th width="10%">作者</th>
            </tr>
            </thead>
            <tbody id="mybody"
            <?php
            $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
            $check__query = "select * from article_info  ";

            $result = mysqli_query($id, $check__query);



            while($row = mysqli_fetch_array($result))
            {
                $href = "showarticles.php?id=". $row['id'] ;
                echo "<tr>";
                echo " <td width=\"10%\" style=\" text-align:center;\"class=\"titleTd\">
                <a id=\"title_1\" href=$href style=\" text-align:center;\">" . $row['id'] . "</a></td>";
//                echo '<td width="10%" style=" text-align:center;"class="titleTd">
//                <a id="title_1" href="showarticle.php?id='. $row['id'] .'" style=" text-align:center;"> 11111</a></td>';


                echo " <td width=\"10%\" style=\" text-align:center;\"class=\"titleTd\">
                <a id=\"title_1\" href=\"#\"style=\" text-align:center;\">" . $row['group1'] . "</a></td>";
                echo "<td width=\"10%\"style=\" text-align:center;\" class=\"authorTd\"><a id=\"author_1\" href=\"#\"style=\" text-align:center;\">" . $row['title'] . "</a></td>";
                echo "<td width=\"10%\" style=\" text-align:center;\" class=\"dateTd\"><a id=\"date_1\" href=\"#\"style=\" text-align:center;\"></a>" . $row['now'] . "</td>";
                echo "<td width=\"50%\"style=\" text-align:center;\" class=\"scanTd\"><a id=\"scan_1\" href=\"#\"style=\" text-align:center;\"></a>" . $row['content'] . "</td>";
                echo "<td width=\"20%\"style=\" text-align:center;\" class=\"saveTd\"><a id=\"save_1\" href=\"#\"style=\" text-align:center;\"></a>" . $row['user_name'] . "</td>";
                echo "</tr>";

            }
            ?>
            </tbody>
        </table>



    </div>

    <div class="before-introduce">

        <div class="before-desc">
            相互交流
            共同促进

        </div>
    </div>
</div>
</body>
</html>