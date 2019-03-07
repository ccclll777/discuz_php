<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新贴发布</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="js/bootstrap-3.3.5-dist/dist/css/bootstrap.css">
    <link href="js/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/writefile.css">
</head>
<body background="img/morocco.png">

<nav class="top_bar navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: black;">山东大学学生论坛</a>
        <ul class="nav navbar-nav navbar-left">
            <li><a id="writeGo" href="#"><span class="glyphicon glyphicon-edit" style="color: black;font-size: 14px"onclick="window.location.href='indexcheck.php'">返回主页</span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <button id="welcome" type="button" class="glyphicon glyphicon-user btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="/favorites.html"><span class="glyphicon glyphicon-star" style="color: rgb(0, 0, 0); font-size: 16px">&nbsp;我的收藏</span></a>
                    </li>
                    <li class="divider"></li>
                    <li >
                        <a href="#"><span class="glyphicon glyphicon-th-list" style="color: rgb(0, 0, 0);font-size: 16px;">&nbsp;用户信息</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-cog" style="color: rgb(0, 0, 0);font-size: 16px;">&nbsp;设置</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>


<form method="post" action="write.php">

<div class="content">
    <div class="container-fluid">

        <input type="text" class="info_input"  placeholder="标题" name="title">
        <hr>

            <input type="text" class="info_input" placeholder="发帖板块(请输入本科交流或者研究生交流)" name="group">



<hr>
        <div id='pad-wrapper'>
            <div id="editparent">
                <div id='editControls' class='span12' style='text-align:center; padding:5px;'>




                    <div class='btn-group'>
                        <a class='btn' data-role='h1' href='#'>h<sup>1</sup></a>
                        <a class='btn' data-role='h2' href='#'>h<sup>2</sup></a>
                        <a class='btn' data-role='p' href='#'>p</a>
                    </div>
                    <div class='btn-group'>
                        <a class='btn' data-role='subscript' href='#'><i class='fa fa-subscript'></i></a>
                        <a class='btn' data-role='superscript' href='#'><i class='fa fa-superscript'></i></a>
                    </div>
                </div>

                <textarea style="width:1000px;height:600px;"class="info_input"type="text" name="content"placeholder="请输入具体内容！"></textarea>
            </div>

        </div>
    </div>
</div>

<div>
        <button name="Submit" class="btn btn-default glyphicon glyphicon-ok sub_btn" type="Submit"  value="提交" ><span>提交</span></button>
</div>

</form>

</body>
</html>