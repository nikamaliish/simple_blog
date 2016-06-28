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
    <article>
        <h3><?= $article['title'] ?></h3>

        <p><i>Опубликовано: <?= $article['date'] ?></i></p>

        <p><?= $article['content'] ?></p>
    </article>

    <footer>
        <p>Мой первый блог<br>Copyright &copy; </p>
    </footer>
</div>
</body>
</html>