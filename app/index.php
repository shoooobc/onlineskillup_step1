<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>POSTのサンプル</title>
</head>
<body>
<?php
$dsn ='pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try{
    $dbn = new PDO($dsn,$user,$pass);


    // ここでクエリ実行する

    $sth = $dbn->prepare('insert into test_comments(name,text) values(?,?)');

    $name = htmlspecialchars($_POST["name"]);
    $text = htmlspecialchars($_POST["text"]);
    $sth ->execute(array($name,$text));
    if($_POST["search"]==null){
        $puery_result = $dbn->query('select * from test_comments');
    }else{
        $sth_select = $dbn->prepare('select * from test_comments where name = ?');
        $search = htmlspecialchars($_POST["search"]);
        $sth_select -> execute(array($search));
        $prepare_result = $sth_select->fetchAll();
    }




    $dbn = null;
}catch(PDOException $e){
    print "DB ERROR".$e->getMessage()."<br/>";
    die();
}


?>
<?php if($_POST["search"]==null){ ?>
    <table border="1">
    <?php
    foreach ($puery_result as $row){?>
        <tr><th><? echo $row["name"] ?></th><th><? echo $row["text"] ?></th></tr>
    <?php
    }
    ?>
    </table>
<? }else{ ?>
    <table border="1">
    <?php
    foreach ($prepare_result as $row){?>

            <tr><th><? echo $row["name"] ?></th><th><? echo $row["text"] ?></th></tr>
        <?php
        }
    }
    ?>
    </table>
<a href="index.html">戻る</a>

</body>
</html>