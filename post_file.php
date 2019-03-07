<?php
session_start();
if(isset($_POST["Submit"]) && $_POST["Submit"] == "提交"&&isset($_SESSION['username']))
{
    $user_name = $_SESSION['username'];
    $file_content = $_POST['file_content'];
    $article_id = $_POST['file_id'];
    $datetime = date('Y-m-d H:i:s');
//查询评论人真实姓名
    $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
    $check__query2 = "select * from user_info where user_name= '$user_name' ";
    $result2 = mysqli_query($id, $check__query2);
    $row = mysqli_fetch_array($result2);
    $use_real_name = $row['user_real_name'];

//    查询帖子的内容和帖子的所有者
    $check__query = "select * from article_info where id= ' $article_id' ";
    $result = mysqli_query($id, $check__query);
    $row2 =  mysqli_fetch_array($result);
    $article = $row2['content'];
    $article_user = $row2['user_real_name'];
    $group1 = $row2['group1'];
    $article_title = $row2['title'];
    if($user_name == "" ||  $file_content== "" )
    {
        echo "<script>alert('请确认内容完整性！'); history.go(-1);</script>";
    }
    else
    {
        $sql = "insert into filecomment(article_id, user_name,user_real_name, file_content, datetime,article_user,article,group1,article_title) 
values('$article_id','$user_name','$use_real_name','$file_content','$datetime','$article_user','$article','$group1','$article_title') ";
        $result = mysqli_query($id,$sql);

        if($result)
        {

            $href = "showarticles.php?id=".$article_id;
            echo "<script> alert('评论成功！');parent.location.href='$href';</script> ";


        }
        else
        {
            echo "<script>alert('评论失败！'); history.go(-1);</script>";
        }

    }
}
else
{
    echo "<script>alert('提交未成功，或您未登录！'); history.go(-1);</script>";
}
?>
