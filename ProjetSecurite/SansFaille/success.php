<html>
    <body>
        <h1>Bravo ! vous êtes connecté</h1>
        <form method="POST">
            <h1>Article sécurisé</h1>
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
    $s = $objPdo->prepare('INSERT INTO PostSecure(Text) Values(:text)');
    $s->bindValue(":text", safeXss($text));
    $s->execute();
    header("Location: success.php");
}

function GetMessage(){
    include "PDO.php";
    $result = $objPdo->query('SELECT * FROM `PostSecure`');
    foreach($result as $key){
        echo "<h3> Article </h3>";
        echo safeXss($key['Text']);
    }
}

function safeXss($text){
    return htmlspecialchars($text);
}
?>