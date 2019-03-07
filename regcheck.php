<?php
/**
 * Created by PhpStorm.
 * User: lichao
 * Date: 2018/9/23
 * Time: 下午7:25
*/
if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
{

    $user_name = $_POST["username"];
    $user_pw = $_POST["password"];
    $user_pw_confirm = $_POST["confirm"];
    $user_real_name = $_POST["userrealname"];
    $user_email = $_POST["useremaim"];
    $user_city = $_POST["usercity"];
    $user_introduce = $_POST["userintroduce"];


    if($user_name == "" || $user_pw == "" || $user_pw_confirm == "")
    {
        echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    }
    else
    {
        if($user_pw ==$user_pw_confirm)
        {
            $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
            if (mysqli_connect_errno($id))
            {
                    echo "连接 MySQL 失败: " . mysqli_connect_error();
            }
            $sql = "select user_name from user_info where user_name= ' $user_name' ";
            $result = mysqli_query($id, $sql);
            $num = mysqli_num_rows($result);
            if($num)
            {
                echo "<script>alert('用户名已存在'); history.go(-1);</script>";
            }
            else{
                $sql = "insert into user_info(user_name,user_pw,user_real_name,user_email,
                user_city,user_introduce)values ('$user_name','$user_pw','$user_real_name','$user_email','$user_city','$user_introduce')";
                $result = mysqli_query($id,$sql);

                if($result)
                {

                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.html">';
//                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
                    echo "<script> alert('注册成功！');parent.location.href='login.html' </script>";


                }
                else
                {
                    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
                }

            }

        }
        else
        {
            echo "<script>alert('密码不一致！'); history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}



?>