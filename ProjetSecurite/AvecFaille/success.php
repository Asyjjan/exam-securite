<html>
    <body>
        <h1>Bravo ! vous êtes connecté</h1>
        <form method="POST">
            <h1>Faille XSS</h1>
            <textarea name="text"></textarea>
            <input type="submit">
        </form>
    </body>
</html>

<?php
include "PDO.php";
GetMessage();

if (isset($_POST['text'])) {
    addMessage($_POST['text']);
}

function AddMessage($text){
    include "PDO.php";
    $s = $objPdo->prepare('INSERT INTO Post(Text) Values(:text)');
    $s->bindValue(":text", $text);
    $s->execute();
    header("Location: success.php");
}

function GetMessage(){
    include "PDO.php";
    $result = $objPdo->query('SELECT * FROM `Post`');
    foreach($result as $key){
        echo "<li>".$key['Text']."</li>";
    }
}
?>