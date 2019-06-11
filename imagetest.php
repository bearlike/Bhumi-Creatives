<?php
  include 'connection.php';

  session_start();

  if(isset($_SESSION['user']))
    $user = $_SESSION['user'];
  else
    header("Location:index.php");

  $user = $_SESSION['user'];
  $pid = $_GET['pid'];

  $sql = "SELECT * FROM project WHERE pid='".$pid."';";
  $result = $conn->query($sql);

  $url = null;
  if($row = $result->fetch_assoc())
  {
    $url = $row['image'];
    $title = $row['title'];
    $doneby = $row['uname'];
    $desc = $row['descri'];
    $tags = $row['tags'];
    $downloads= $row["downloads"];
  }

  $q1="select count(uname) from likes where pid='".$row['pid']."';";
  $rs1=$conn->query($q1);
  if($row=$rs1->fetch_assoc())
  {
    $likes= $row['count(uname)'];
   }
 ?>
