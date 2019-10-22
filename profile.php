<?php
	session_start();
	if(!(isset($_SESSION['login'])))
	{
		header("Location: registration/entry.php");
		exit;
	}
	require "connection.php";
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="autdor" content="">

		<title>test</title>
		
		<link href="style.css" rel="stylesheet">
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
						<a class="nav-link" href="section.php">Секции</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="profile.php">Личный кабинет</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="event/create.php">Добавить мероприятие</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="exit.php">Выйти</a>
					</li>
					<li class="nav-item">
                 		 <a class="nav-link" href="#"><?=$_SESSION['login']?></a>
                	</li> 
				</ul>
				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</div>
      </nav>
	<div class="wrap">
		<div class="wrapper">
			<div class="container emp-profile">
				<form metdod="post">
					<div class="row">
						<div class="col-md-4">
							<div class="profile-img mb-3" style="background-image:url('images/profile.jpg')"></div>
							<div class="profile-work">
								<div class="profile-children mb-3">
									<p class="lead">Дети</p>
									<hr>
									<?php
										$req = 'SELECT children.name FROM children, users WHERE children.users_id = users.id';
										foreach($dbh->query($req) as $tur){?>
											<?= $tur['name']; ?> <br>
										<?php } ?>
								</div>								
								<div class="profile-hasben mb-3">								
									<p class="lead">Муж</p>
									<hr>
									<?php
										$req = 'SELECT spouse.name, spouse.phone, spouse.address FROM spouse, users WHERE spouse.users_id = users.id';
										foreach($dbh->query($req) as $tur){?>
										<?= $tur['name']; ?> <br>Тел: <?= $tur['phone']; ?> <br>Адрес: <?= $tur['address']; ?> <br>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="profile-head">
								<h5><?php 
									$requery = 'SELECT * FROM users';
									foreach($dbh->query($requery) as $row){
									echo $row['name'];
									?>
								</h5>
								<p class="lead">Личная и контактная информация</p>
								<table class="table table-bordered table-hover">
									<tbody>
									<tr>
										<td scope="row">Профессия</td>
										<td> 	<?= $row['profession']?> </td> 
									</tr>
									<tr>
										<td scope="row">Дата рождения</td>
										<td> <?= $row['dob']?> </td>											  
									</tr>
									<tr>
										<td scope="row">Адрес</td>
										<td> <?= $row['address']?> </td>
									</tr>
									<tr>
										<td scope="row">Телефон</td>
										<td> <?= $row['phone']?> </td>										 
									</tr>
									<tr>
										<td scope="row">Эл.почта</td>
										<td> <?= $row['email']?> </td>
									</tr>
									<tr>
										<td scope="row">Адрес работы</td>
										<td> <?= $row['work_address']?> </td>
									</tr>
									<tr>
										<td scope="row">Телефон работы</td>
										<td> <?= $row['work_phone']?> </td>
									</tr>
									<?php } ?>
									</tbody>
								</table>									
							</div>
						</div>
					</div>
				</form>           
			</div>
		</div>
	</div>		
    <footer class="container">
		<hr>
        <p>&copy; 2019 Company, Inc. </p>
    </footer>
  </body>
</html>
