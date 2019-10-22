<?php
session_start();
if(!(isset($_SESSION['username'])))
{
    header("Location: registration/entry.php");
    exit;
}
include "../connection.php";
 
$id_delete = $_GET['id'];

$requery = 'DELETE FROM event WHERE id=:id';
$stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$stmt->execute(array (':id' => $id_delete));
header("Location: ../index.php");