
<hr class="featurette-divider">
        <?php 
        if($_GET['status'] == "edit")
        { ?>
          <a href="edit/form_update_event.php?id=<?=$id?>" class="btn btn-warning active float-right" role="button" aria-pressed="true">Редактировать</a>
          <a href="delete_event.php?id=<?=$id?>" class="btn btn-danger active float-right" role="button" aria-pressed="true">Удалить</a>
          <br>
        <?php } ?>
        <br><br>
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"><?= $title ?> </h2>
            <p class="lead"><?= $desc ?> </p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="/img/<?=$img?>" alt="Generic placeholder image">
          </div>
        </div>
