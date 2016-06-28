<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <h1>Мой первый блог</h1>

    <div>
        <form action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="post">
            <label>Название<input type="text" name="title" value="<?php if(isset($article['title'])) echo $article['title']?>" class="form-item" width="100%" autofocus
                                  required></label><br>
            <label>Дата<input type="date" name="date" value="<?=$article['date']?>" class="form-item" required></label><br>
            <label>Содержимое<textarea name="content" class="form-item" required><?php if(isset($article['content'])) echo $article['content']?></textarea></label><br>
            <input type="submit" class="btn" value="Сохранить">
        </form>
    </div>

    <footer>
        <p>Мой первый блог<br>Copyright &copy; </p>
    </footer>
</div>
</body>
</html>