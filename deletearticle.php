<?php
session_start();
$id2 = $_GET['id'];

if(isset($id2))
{
    $id = @mysqli_connect("localhost:3306","root","SSwns304275","bbs_data")or die("无法连接到服务器");
    $check__query2 = "select * from article_info where id='$id2' ";
    $result2 = mysqli_query($id,$check__query2);
    $row = mysqli_fetch_array($result2);
    $user_name = $row['user_name'];
    $check__query1 = "delete  from article_info where id='$id2' ";
    $result1 = mysqli_query($id,$check__query1);
    if(!$result1 )
    {
        echo "<script> alert('删除失败！');</script>";

    }
    else
    {


            $href = "linkme.php?user_name=".$user_name ;

        echo "<script>alert('删除成功！');window.location.href=' $href';</script>";

    }
}
else
{
    echo "<script> alert('服务器连接失败！');</script>";
}
?>