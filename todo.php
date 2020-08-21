<!--
(追加)post:なし
(編集)post:todo_code,edit
(削除)post:todo_code,delete -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php
  try {
    $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    // $sql='select LAST_INSERT_ID()';
    // $stmt=$dbh->prepare($sql);
    // $stmt->execute();
    // $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    // $lastcode=$rec['LAST_INSERT_ID()'];

      $sql='select code,name from todo where 1';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

      // while(true){
      //   $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      //   if($rec=false){
      //     break;
      //   }
      //   $todo_code[]=$rec;
      // }

      // $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      // $todo_code[]=$rec['code'];


    $dbh=null;

  } catch (\Exception $e) {

  }
  ?>


  <h1>買い物リスト</h1>

  <!-- <form class="" action="todo_branch.php" method="post">
    <ul>
      <?php while(true): ?>
        <?php $rec=$stmt->fetch(PDO::FETCH_ASSOC) ?>
        <?php if($rec==false): ?>
          <?php break; ?>
        <?php endif ?>
        <li><?php echo $rec['name'] ?></li>
        <input type="radio" name="todo_code" value="<?php echo $rec['code'] ?>">
        <input type="submit" name="edit" value="編集">
        <input type="submit" name="delete" value="削除">
        <br><br>
      <?php endwhile ?>
    </ul>
    <br>
    <a href="todo_add.php">追加</a>
  </form> -->

  <br><br><br>
  <?php
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  echo $rec['code'];
  ?>

  <?php foreach ($todo_code as $val): ?>
  <?php echo $val['code']; ?>
  <?php endforeach ?>


  </body>
</html>
