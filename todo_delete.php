<?php
try {
  $code=$_GET['code'];

  $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
  $user='root';
  $password='';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql='delete from todo where code=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$code;
  $stmt->execute($data);

  $dbh=null;

  header('Location:todo.php');
  exit();


} catch (\Exception $e) {
  echo "sorry";
  exit();
}




?>
