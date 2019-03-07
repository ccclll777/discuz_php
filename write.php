<?php
session_start();

if(isset($_POST["Submit"]) && $_POST["Submit"] == "提交")
{

     $title =$_POST['title'];
     $group1 = $_POST['group'];
     $content = $_POST['content'];
     $time = date('Y-m-d H:i:s');

    $user_name =  $_SESSION ['username'];
    $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
    $check__query2 = "select * from user_info where user_name= '$user_name' ";
    $result2 = mysqli_query($id, $check__query2);
    $row = mysqli_fetch_array($result2);
    $user_real_name = $row['user_real_name'];
    if($title == NULL )
    {
        echo "<script>alert('请输入帖子标题！'); history.go(-1);</script>";
    }
    else if($group1 ==  NULL )
    {
        echo "<script>alert('请输入发帖板块！'); history.go(-1);</script>";
    }
    else if($content ==  NULL )
    {
        echo "<script>alert('请输入具体内容！'); history.go(-1);</script>";
    }
    else
        {


        $check__query =  "insert into article_info(content,user_name,user_real_name,now,title,group1)values ('$content','$user_name','$user_real_name','$time','$title','$group1')";

        $result = mysqli_query($id, $check__query);

        if($result)
        {

            echo "<script>alert('发送成功！');window.location.href='indexcheck.php';</script>";
        } else {
            echo "<script>alert('发送失败！');history.go(-1);</script>";
            echo "发送失败";
        }


    }

}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}

?>