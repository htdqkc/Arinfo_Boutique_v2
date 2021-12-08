<div class="py-5">
    <div class="container">
      <div class="row">
        <?php
          foreach($articles as $key => $value):
        ?>
        <div class="col-md-4">
          <div class="card" style="position:relative;"><div style="width:500px;height:300px;">
          <img id="produit<?= $key ?>" class="card-img-top" src="<?= $value['image'] ?>" alt="Card image cap">
          </div>
            <div class="card-body">
              <h4 class="card-title"><?= $value['title'] ?> - <?= $value['price'] ?>€</h4>
              <p class="card-text"><?= $value['desc_short'] ?></p> <a href="#" onclick="AjoutPannier(<?= $key ?>)" class="btn btn-success">Ajouter au pannier</a> <a href="details.php?id=<?= $key ?>"  class="btn btn-warning">Regarder</a>
            </div>
          </div>
        </div>
        <?php
          endforeach;
        ?>
      </div>
    </div>
  </div>

<style>

  .card-img-top{
    animation: 4s linear 0s infinite alternate move_eye;
    height:300px;
    width:100%;
    object-fit: cover;
    position:absolute;
    top:0;
    transform: translateY(0);
    transform: translateX(0);
  }
</style>
