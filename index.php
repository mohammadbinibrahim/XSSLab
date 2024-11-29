<!DOCTYPE HTML>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>XSS</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    <div id='mainsearch'>
        <p class='main'>Write in Monospace!</p>
        <form action='index.php' method='GET'>
            <input type='text' id='inputfield' name='searchedperson'>
            <br>
            <input type='submit' id='submitbutton' value='Search!'>
        </form>
        <br>
        <br>
    </div>
</body>
</html>

<?php
    $result = $_GET['searchedperson'];
    $blocked = ['<script>', '<img', '<a>', '<a'];

    foreach($blocked as $block){
        if (strpos(strtolower($result), $block) !== false){
            echo "<p class='result'>That's not allowed!</p>";
            $cond = true;
            break;
        }
    }
    if (!$cond){
        echo "<p class='result'>$result</p>";
    }
?>