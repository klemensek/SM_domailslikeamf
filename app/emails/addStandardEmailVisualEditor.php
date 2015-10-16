<?php



require '../connect.php';



$book = R::dispense("mailsourceresult");
$book->campaign = $_POST['campaign'];
$book->name = $_POST['name'];
$book->sourceresult = $_POST['sourceresult'];
$book->standardEmailAccount = $_POST['standardEmailAccount'];
$book->standardEmailGroup = $_POST['standardEmailGroup'];
$book->standardEmailId = $_POST['standardEmailId'];
$book->subject = $_POST['subject'];
$id = R::store( $book );
