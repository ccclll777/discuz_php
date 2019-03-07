<?php

    session_start();

if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
{
    $user_name = $_POST["username"];
    $user_pw = $_POST["password"];
    if($user_name == "" || $user_pw == "")
    {
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
    }
    else{
        $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
        $check__query = "select * from user_info where user_name= '$_POST[username]' and user_pw = '$_POST[password]'";

        $result = mysqli_query($id, $check__query);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中
            $_SESSION ['username'] = $user_name;
            $_SESSION['password'] = $user_pw;
            if (! empty ( $remember )) { // 如果记住登陆，则记录登录状态，把用户名和加密的密码放到cookie里面
                setcookie ( "username", $username, time () + 3600 * 24 * 365 );
                setcookie ( "password", $password, time () + 3600 * 24 * 365 );
            }


            echo "<script> alert('登录成功！');parent.location.href='indexcheck.php'; </script>";
        }
        else
        {
            echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
        }

    }


}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}