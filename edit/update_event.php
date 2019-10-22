<?PHP
header('Content-Type: text/plain; charset=utf-8');

session_start();
if(!(isset($_SESSION['login'])))
{
    header("Location: registration/entry.php");
    exit;
}
require "../connection.php";

if($_POST['title'] == NULL || $_POST['desc'] == NULL)
{
    echo "Заполните поля и добавьте картинку";
}
else
{
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $desc = htmlspecialchars($_POST['desc'], ENT_QUOTES);
    $id_event = htmlspecialchars($_POST['custId'], ENT_QUOTES);


    $temp = explode(".", $_FILES["img"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $newfilename);
    
    $requery = 'UPDATE event SET title=:title, description=:description, img=:img WHERE id=:id';
    $stmt = $dbh->prepare($requery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array (':title' => $title, ':description' => $desc, ':img' => $newfilename, ':id' => $id_event));
    header("Location: ../index.php");
}
