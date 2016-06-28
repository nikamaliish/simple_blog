<?php

function articles_all($link)
{
    //  --------------------------------------- З А П Р О С  ----------------------------------
    $query = "SELECT * FROM articles ORDER BY id ASC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    //----------------------   И З В Л Е Ч Е Н И Е   И З   Б Д  -------------------------------
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;
}


function articles_get($link, $id_article)
{
    //  --------------------------------------- З А П Р О С  ----------------------------------
    $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $article = mysqli_fetch_assoc($result);

    return $article;
}

function articles_new($link, $title, $date, $content)
{
    $title = trim($title); // убираем пробелы в начале и в конце
    $content = trim($content);

    if ($title == "")
        return false;

    // sprintf подставляет вместо '%s' соответственно $title, $date и $content
    // mysqli_real_escape_string экранирует входящую строку, символы, которые могут испортить запрос
    $t = "insert into articles (title, date, content) values ('%s', '%s', '%s')";  // %s - тип данных строка
    $query = sprintf($t, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content));

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}

function articles_edit($link, $id, $title, $date, $content)
{
    // ------------------------ ПОДГОТОВКА -----------------------------
    $title = trim($title); // убираем пробелы в начале и в конце
    $content = trim($content);
    $date = trim($date);
    $id = (int)$id;

    // ------------------------------ ПРОВЕРКА --------------------------------
    if ($title == '')
        return false;

    // ------------------------------ ЗАПРОС --------------------------------
    $sql = "UPDATE articles SET title='%s', content='%s', date='%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date), $id);

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link); // результат равен либо 1, если статья отредактирована, либо 0, если статьи с этим id нет
}

function articles_delete($link, $id)
{
    // ------------------------------ ПРОВЕРКА --------------------------------
    if ($id == 0)
        return false;

    $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}


function articles_intro($text, $len = 500) {

    while (mb_substr($text, $len, 1) <> " ") $len--;
    return mb_substr($text, 0, $len)."...";
}