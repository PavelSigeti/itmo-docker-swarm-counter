<?php

try {
    $dbh = new PDO('mysql:host=mysql;port=3306;dbname=counter', 'root', 'root');
    $count = $dbh->prepare("INSERT INTO counter.data (`datetime`, `client_info`) VALUES (now(), ?) ");

    $response = $count->execute([ $_SERVER['HTTP_USER_AGENT'] ]);

    echo 'Hello from PHP! I have been seen  ' . $dbh->lastInsertId() . ' times. <br>'; 

} catch (PDOException $e) {
    print "Error!:".$e->getMessage()."<br/>";
    die();
}