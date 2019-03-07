
<?php
session_start();
$username= $_GET['user_name'];

$id = @mysqli_connect("localhost:3306", "root", "SSwns304275", "bbs_data") or die("无法连接到服务器");
$check__query = "select * from user_info  where user_name='$username'";

$result = mysqli_query($id, $check__query);
$row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css">
    <link href="css/indexcheck.css"rel="stylesheet">
    <link rel="stylesheet" href="css/jquery">

    <link rel="stylesheet" href="cropper.css">
    <link rel="stylesheet" href="ImgCropping.css">

    <style>
        .index{
        /*position: absolute;*/
        /*top: 78px;*/
        /*bottom: 0;*/
        /*width: 100%;*/
        width: 100%;
        height: 100%;
        padding: 1px 0 0 0;
        background: #D7DFDC;
    }
    .index-include{
        width: 1200px;
        height: 700px;
        margin: 20px auto;
        font-size: 0;
        overflow: hidden;
        -webkit-box-shadow: 0px 0 2px rgba(0,0,0,.2);
        -moz-box-shadow: 0px 0 2px rgba(0,0,0,.2);
        box-shadow: 0px 0 2px rgba(0,0,0,.2);
    }
    .mdui-panel-item-header{
        position: relative;
    }
    .right-tab-num{
        width: 32px;
        height: 16px;
        display: inline-block;
        position: absolute;
        right: 5%;
        /* position: absolute; */
        /* float: right; */
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        background: #96A5AB;
        line-height: 16px;
        text-align: center;
        color: #fff;
        font-size: 8px;
    }
    .index-right{
        width: 1000px;
        height: 100%;
        min-height: 100%;
        font-size: 16px;
        display: inline-block;
        vertical-align: bottom;
        background: #F5F4F7;
    }
    .right-title{
        height: 60px;
        width: 90%;
        line-height: 100px;
        font-size: 22px;
        margin: 0 auto 10px auto;
        padding: 0 0 0 -1%;
    }
    .right-title-instruction{
        width: 90%;
        height: 50px;
        line-height: 50px;
        margin: 20px auto 10px auto;
        border-bottom: 1px solid #e6e6e6;
    }
    .team-img img{
        width: 100%;
    }
    .team-card img{
        width: 100%;
    }
    .member-delete img{
        width: 100%;
    }
    form input{
        height: 30px;
        line-height: 30px;
        color: #344659;
        border:1px solid #c8d2d7;
        text-indent: 12px;
        width: 200px;
    }
    form input:focus{
        border: 1px solid #19BB9B;
    }
    .form-line{
        margin-top: 18px;
    }
    .right-person{
        width: 90%;
        margin: 0 auto;
    }

    .person-head img{
        width: 100%;
    }
    .person-head .mask{
        position: absolute;
        background: rgba(0,0,0,0.7);
        color: #f5f1e5;
        display: none;
        width: 120px;
        height: 120px;
        margin-left: 100px;
    }</style>
</head>
<body background="img/morocco.png">
<!--header start-->
<link rel="stylesheet" href="css/index.css">

<div class="head">

    <div class="sdu" style="font-size: 18px;display: inline-block;"> <a class="vintage1" href="#" style="color: black;">山东大学学生论坛</a></div>
    <div class="tab">
        <a href="indexcheck.php" class="direct ">首页</a>
        <a href="#" class="direct ">本科交流</a>
        <a href="#" class="direct ddd" id="link">研究生交流</a>
        <a href="#" class="direct ">校内新闻</a>
        <a href="#" class="direct">问答</a>
        <a href="#" class="direct">个人信息</a>
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




<div class="index">
    <div class="index-include">

        <div class="index-right">
            <div class="right-tab">
                <div class="right-title">
                    <span style="font-size: 14px;margin-left: 10px;">Personal information</span>
                    <br/>
                </div>
                <div class="right-title-instruction">

              </span>
                </div>
                <div class="right-person">
                    <div class="mdui-container">
                        <form action="/Person/update_info.html" method="post">

                            <div class="mdui-row mdui-row-gapless form-line">

                            </div>
                            <div class="mdui-row mdui-row-gapless form-line">
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">用户名</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                            echo "<input name=\"phone\" value=\"";
                                            echo $row['user_name'];
                                            echo "\"/>"
                                    ?>

                                </div>
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">真实姓名</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                    echo "<input name=\"phone\" value=\"";
                                    echo $row['user_real_name'];
                                    echo "\"/>"
                                    ?>
                                </div>
                            </div>
                            <div class="mdui-row mdui-row-gapless form-line">
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">所在城市</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                    echo "<input name=\"phone\" value=\"";
                                    echo $row['user_city'];
                                    echo "\"/>"
                                    ?>
                                </div>
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">邮箱</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                    echo "<input name=\"phone\" value=\"";
                                    echo $row['user_email'];
                                    echo "\"/>"
                                    ?>
                                </div>
                            </div>
                            <div class="mdui-row mdui-row-gapless form-line">
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">性别</div>
                                <div class="mdui-col-xs-4">
                                    <input name="sex" value="男"/>
                                </div>
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">注册时间</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                    echo "<input name=\"phone\" value=\"";
                                    echo $row['time1'];
                                    echo "\"/>"
                                    ?>
                                </div>
                            </div>
                            <div class="mdui-row mdui-row-gapless form-line">
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px">个人简介</div>
                                <div class="mdui-col-xs-4">
                                    <?php
                                    echo "<input name=\"phone\" value=\"";
                                    echo $row['user_introduce'];
                                    echo "\"/>"
                                    ?>
                                </div>
                                <div class="mdui-col-xs-2" style="text-align: center;margin-top: 10px"></div>

                            </div>
                            <div class="mdui-row mdui-row-gapless form-line" style="margin-top: 30px">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>