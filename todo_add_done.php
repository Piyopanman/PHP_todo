<?php

  try {
    $add_name=$_POST['add_name'];
    $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='insert into todo(name) values(?)';
    $stmt=$dbh->prepare($sql);
    $data[]=$add_name;
    $stmt->execute($data);

    $dbh=null;

    header('Location:todo.php');
    exit();

  } catch (\Exception $e) {
    print '障害発生中';
    exit();
  }

?>
