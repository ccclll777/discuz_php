<?php

    session_start();
    ?>
<html lang="en">
<head style="background-color: #00c0FF">
    <meta charset="UTF-8">
    <title>论坛主页</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css">
    <link href="css/indexcheck.css"rel="stylesheet">
    <script type="text/php" src="indexcheck.php"></script>
    <link type="text/css" rel="stylesheet" href="js/bootstrap-3.3.5-dist/dist/css/bootstrap.css">

    <script src="js/http_code.jquery.com_jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap-3.3.5-dist/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/bootbox.js"></script>
    <script>

        $(document).ready(function () {



            validateLogin();

            isNewReply();

            //轮播设置
            $('.carousel').carousel({
                interval: 2000
            });

    </script>
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
<body  background="img/morocco.png">
<div id="app">
<div class="head">

    <div class="sdu" style="font-size: 18px;display: inline-block;"> <a class="vintage1" href="#" style="color: black;">山东大学学生论坛</a></div>
    <div class="tab">
        <a href="#" class="direct ">首页</a>
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
        <?php
        if(isset($_SESSION['username']))
        {

            $href1 = "linkme.php?user_name=".$_SESSION['username'];
            echo "<a href=$href1" ;



            ?>
            class="direct" >与我相关</a>
            <?php
        }
        else
        {
            echo " <a href=\"#\" class=\"direct\">与我相关</a></a>";

        }
        ?>

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
<!--    <table border="0" align="left" cellpadding="0" cellspacing="0" cellspace="0">-->
<!--        <tr>-->
<!--            <td height="85" valign="top" id="demo1">-->
<!--                <table width="100%" border="0" cellspacing="0" cellpadding="0">-->
<!--                    <tr>-->
<!--                        <td><a href="#"><img src="img/first.png" width="427" height="400" border="0"></a></td>-->
<!--                        <td><a href="#"><img src="img/second.png" width="427" height="400" border="0"></a></td>-->
<!--                        <td><a href="#"><img src="img/third.png" width="427" height="400" border="0"></a></td>-->
<!---->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td id="demo2" valign="top"></td>-->
<!--        </tr>-->
<!--    </table>-->
    <!----------------------------------------------------------广告栏----------------------------------------------------------->
    <div id="LBbox" class="carousel slide" data-ride="carousel">
        <!-- 圆点按钮 -->
        <ol class="carousel-indicators">
            <li data-target="#LBbox" data-slide-to="0" class="active"></li>
            <li data-target="#LBbox" data-slide-to="1"></li>
            <li data-target="#LBbox" data-slide-to="2"></li>
        </ol>
        <!-- 轮播内容 -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="http://www.sdu.edu.cn/"><img src="img/first1.png" alt="1 slide"></a>
                <div class="carousel-caption">
                    <h1>山东大学官方网站</h1>
                    <p></p>
                </div>
            </div>
            <div class="item">
                <a href="http://www.bkjx.sdu.edu.cn/"><img src="img/second2.png" alt="2 slide"></a>
                <div class="carousel-caption">
                    <h1>山东大学本科学院网站</h1>
                    <p></p>
                </div>
            </div>
            <div class="item">
                <a href="http://www.lib.sdu.edu.cn/index.html"><img src="img/third3.jpg" alt="3 slide"></a>
                <div class="carousel-caption">
                    <h1>山东大学图书管理系统</h1>
                    <p></p>
                </div>
            </div>
        </div>
        <!-- 左按钮 -->
        <a href="#LBbox" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">上一页</span>
        </a>
        <!-- 右按钮 -->
        <a href="#LBbox" class="right carousel-control" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">下一页</span>
        </a>
    </div>
</div>

<div class="mainBody">

        <table class="altrowstable" id="alternatecolor" width="100%">
            <thead>
            <tr>

                <th width="10%"style="text-align: center">讨论区</th>
                <th width="20%"style="text-align: center">标题</th>
                <th width="10%"style="text-align: center">发帖日期</th>
                <th width="50%"style="text-align: center">帖子</th>
                <th width="10%"style="text-align: center">作者</th>
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
                <a id=\"title_1\" href=$href style=\" text-align:center;\">" . $row['group1'] . "</a></td>";
                echo "<td width=\"10%\"style=\" text-align:center;\" class=\"authorTd\"><a id=\"author_1\" href=$href style=\" text-align:center;\">" . $row['title'] . "</a></td>";
                echo "<td width=\"10%\" style=\" text-align:center;\" class=\"dateTd\"><a id=\"date_1\" href=$href style=\" text-align:center;\">" . $row['now'] . "</a></td>";
                echo "<td width=\"50%\"style=\" text-align:center;\" class=\"scanTd\"><a id=\"scan_1\" href=$href style=\" text-align:center;\">" . $row['content'] . "</a></td>";
                echo "<td width=\"20%\"style=\" text-align:center;\" class=\"saveTd\"><a id=\"save_1\" href=$href style=\" text-align:center;\">" . $row['user_real_name'] . "</a></td>";
                echo "</tr>";

            }
            ?>
            </tbody>
        </table>



</div>

<div class="before-introduce">

    <div class="before-desc">
       <p class="vintage3"style="text-align: center">相互交流 共同促进</p>

    </div>
</div>
</div>
</body>
</html>