<!--
(追加)post:なし
(編集)get:code
(削除)get:code -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>todo</title>
  </head>
  <body>
  <?php
  try {
    $dsn='mysql:dbname=test01;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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

<div class="container">

  <h1>todoリスト</h1>
<div class="todo_main_container">

  <form class="" action="todo_branch.php" method="post">
    <ul>
      <?php while(true): ?>
        <?php $rec=$stmt->fetch(PDO::FETCH_ASSOC) ?>
        <?php if($rec==false): ?>
          <?php break; ?>
        <?php endif ?>
        <li>
          <div class="todo_item">
            <?php echo $rec['name'] ?>
          </div>
          <div class="todo_edit">
            <a href="todo_edit.php?code=<?php echo $rec['code'] ?>">編集</a>
          </div>
          <div class="todo_delete">
            <a href="todo_delete.php?code=<?php echo $rec['code'] ?>">削除</a>
          </div>

        </li>
      <?php endwhile ?>
    </ul>
    <a href="todo_add.html" class="new_button">新規登録</a>
  </form>

</div>

</div>

  </body>
</html>
