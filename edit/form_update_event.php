<?php
session_start();
if(!(isset($_SESSION['login'])))
{
    header("Location: registration/entry.php");
    exit;
}
include "../connection.php";
 
$id_event = $_GET['id'];
$requery = 'SELECT title, description FROM event WHERE id ='.$id_event;
foreach($dbh->query($requery) as $row)
{
    $title = $row['title'];
    $desc = $row['description'];
}
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="autdor" content="">

		<title>test</title>
		
		<link href="../style.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
			<a class="navbar-brand" href="#">Заря</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../section.php">Секции</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="../profile.php">Личный кабинет</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../exit.php">Выйти</a>
					</li>
				</ul>
				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</div>
      </nav>
	<div class="wrap container">
        <br>
        <div class="alert alert-primary text-center" role="alert">
            Изменение мероприятия
        </div>
        <form action="update_event.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="<?=$title?>">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"><?=$desc?></textarea>
            </div>
			<input type="hidden" id="custId" name="custId" value="<?=$id_event?>">
            <div class="form-group">
                <label for="img">Фото с мероприятия</label>
                <input type="file" class="form-control-file" name="img" accept="image/jpeg,image/png,image/gif">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        
	</div>		
    <footer class="container">
		<hr>
        <p>&copy; 2019 Arman, Inc. </p>
    </footer>
  </body>
</html>