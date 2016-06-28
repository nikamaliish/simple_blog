<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Мой первый блог</h1>
    <a href="admin">Панель Администратора</a>
    <?php foreach($articles as $a): ?>
    <article>
        <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
        <p><i>Опубликовано: <?=$a['date']?></i></p>
        <p><?=articles_intro($a['content'])?></p>
    </article>
    <?php endforeach ?>
    <footer>
        <p>Мой первый блог<br>Copyright &copy; </p>
    </footer>
</div>
</body>
</html>