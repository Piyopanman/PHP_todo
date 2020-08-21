<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php
  try {
    $name=$_POST['todo_name'];
    $code=$_POST['code'];

    $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='update todo set name=? where code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$name;
    $data[]=$code;
    $stmt->execute($data);

    $stmt=null;

    header('Location:todo.php');
    exit();


  } catch (\Exception $e) {
    print 'sorry';
    exit();
  }


  ?>

  </body>
</html>
