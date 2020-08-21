<!-- post:todo_name,code -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    try {
      $code=$_GET['code'];

      $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
      $user='root';
      $password='';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql='select name from todo where code=?';
      $stmt=$dbh->prepare($sql);
      $data[]=$code;
      $stmt->execute($data);

      $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      $todo_name=$rec['name'];

      $dbh=null;

    } catch (\Exception $e) {
      print 'sorry';
      exit();
    }

    ?>

    <h1>編集</h1>
    <form class="" action="todo_edit_done.php" method="post">
      <input type="text" name="todo_name" value="<?php echo $todo_name ?>">

      <input type="hidden" name="code" value="<?php echo $code ?>">

      <input type="submit" name="" value="OK"> <br>
      <input type="button" name="" value="戻る" onclick="history.back()">
    </form>


  </body>
</html>
