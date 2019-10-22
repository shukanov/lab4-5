<?php
  session_start();
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
            <li class="nav-item active">
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
                <a class="nav-link" href="registration/reg.php">Регистрация</a>
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
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Запись на секцию плавания</h1>
          <p>Плавание в раннем возрасте имеет массу положительных моментов и благотворно влияет на детский организм.Дети, чьи родители применяют методику раннего обучения плаванию, растут здоровыми, закаленны­ми, психически уравновешенными. Они намного раньше своих сверстников начинают ходить, овладевают речью и осваивают сложные двигательные навыки. В дальнейшем они быстрее учатся читать и писать, испытывают гораздо меньше проблем в общении со сверстниками в детском саду, школе, различных кружках и т. д. Маленькие пловцы реже болеют, хорошо обучают­ся, обладают хорошей памятью (в том числе и двигательной), отличаются редкой уравновешенностью и умением выбирать верные решения в сложных ситуациях. </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Записаться &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Гимнастика</h2>
            <p>Постоянные занятия укрепляют осанку, развивают музыкальный слух, координацию и двигательный аппарат. Здесь дети учатся чувствовать музыку и правильно показывать настроение в движениях. Кроме того, тренируются мышцы, воспитывается стойкость и формируется точность движений. </p>
            <p><a class="btn btn-success" href="#" role="button">Записаться &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Шахматы</h2>
            <p>Регулярные занятия научат маленького шахматиста разумно мыслить, рассудительно и предельно творчески подходить к решению самых сложных задач, быстро и правильно предпринимать шаги. Со временем он сможет одинаково спокойно встречать свои победы и поражения, а также самостоятельно нести за них ответственность. </p>
            <p><a class="btn btn-success" href="#" role="button">Записаться &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Пение</h2>
            <p>Занятия пением способствуют улучшению психического и эмоционального состояния ребенка, что очень важно для подрастающего поколения. Регулярные занятия вокалом тренируют дикцию ребенка, вследствие чего речь малыша становится четкой, последовательной, без дефектов.</p>
            <p><a class="btn btn-success" href="#" role="button">Записаться &raquo;</a></p>
          </div>
        </div>

        

      </div> <!-- /container -->
	</div>
    <footer class="container">
		<hr>
        <p class="float-right"><a href="#">Наверх</a></p>
        <p>&copy; 2017-2018 Company, Inc. </p>
      </footer>

  </body>
</html>
