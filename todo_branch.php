<?php

//追加
if(isset($_POST['add'])==true){
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

    header('Location:todo.php');

  } catch (\Exception $e) {
    print '障害発生中';
    exit();
  }
}


//編集
if(isset($_POST['edit'])==true){
  try {
    $todo_code=$_POST['todo_code'];
    echo $todo_code;

    

  } catch (\Exception $e) {

  }

}


?>
