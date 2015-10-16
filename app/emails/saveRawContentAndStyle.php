<?php


require '../connect.php';


$book = R::dispense("mailrawContent");
$book->rawContent = $_POST['rawContent'];
$book->rawStyle = $_POST['rawStyle'];
$book->standardEmailId = $_POST['standardEmailId'];
$id = R::store( $book );
