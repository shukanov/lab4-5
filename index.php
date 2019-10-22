<?php
  session_start();
  require "connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>test</title>
	
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Заря</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="section.php">Секции</a>
            </li>
            <?php 
            if(isset($_SESSION['login']))
              {?>
                <li class="nav-item">
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
                <?php
              } 
            else
            {?>
              <li class="nav-item">
                <a class="nav-link" href="registration/entry.php">Войти</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="registration/reg.php">Регистрация</a>
              </li> <?php
            }
            ?>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="wrap">
      <div class="container">
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="images\section2.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Гимнастика</h2>
            <p>Польза спорта очевидна, поэтому приучать организм к нагрузкам надо с малых лет. Отличным выходом многие профессиональные спортсмены называют гимнастику.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Просмотреть &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="images\section1.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Плавание</h2>
            <p>Раннее плавание способствует быстрому физическому и психомоторному развитию ребенка, снижает присущий младенцам первых месяцев жизни повышенный тонус сгибательных мышц, обеспечивает ускоренное формирование двигательных умений.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Просмотреть &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="images\section3.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Шахматы</h2>
            <p>Шахматы вырабатывают талант мыслить самостоятельно. Многоходовые партии развивают логику, память, воображение. В процессе игры ребенку прививается усидчивость, целеустремленность, внимательность.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Просмотреть &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <br><br>
        <?php
        if(isset($_SESSION['login']))
        {
          if($_GET['status'] == "edit")
          { ?>
            <a href="/" class="btn btn-success active" role="button" aria-pressed="true">Отменить</a>
          <?php }
          else
          { ?>
            <a href="index.php?status=edit" class="btn btn-success active" role="button" aria-pressed="true">Редактировать</a>
          <?php }
        }
        ?>
        <!-- START THE FEATURETTES -->
        <?php require "event/eventList.php"; ?>
       
      </div><!-- /.container -->
    </div>
    <footer class="container">
      <hr>
      <p class="float-right"><a href="#">Наверх</a></p>
      <p>&copy; 2017-2018 Company, Inc. </p>
    </footer>
  </body>
</html>
