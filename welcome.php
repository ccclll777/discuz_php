<html>
<head>
    <meta charset="UTF-8">
    <title>欢迎登录界面</title>
</head>
<body>

<?php
session_start ();
if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录
    ?>
    欢迎登录<?php
    echo "${_SESSION["username"]}";//显示登录用户名
    ?><br>
    您的ip：<?php
    echo "${_SERVER['REMOTE_ADDR']}";//显示ip
    ?>
<br>
    您的语言：
    <?php
    echo "${_SERVER['HTTP_ACCEPT_LANGUAGE']}";//使用的语言
    ?>
<br>
    浏览器版本：
    <?php
    echo "${_SERVER['HTTP_USER_AGENT']}";//浏览器版本信息
    ?>
    <a href="exit.php">退出登录</a>
<?php
} else {//code不存在，调用exit.php 退出登录
?>
    <script type="text/javascript">
        alert("退出登录");
        window.location.href="exit.php";
    </script>
    <?php
}
?>
<br>
<a href="alter_password.html">修改密码</a>

</body>
</html>