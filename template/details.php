<div class="py-5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="p-4 col-lg-8">
          <h4 class="mb-3 text-white" style="font-weight:bold"><?= ProductList()[$_GET['id']]['title'] ?> - <?= ProductList()[$_GET['id']]['price'] ?>€ </h4>
          <div class="blockquote text-muted">
            <p class="mb-0" style="color:white"><?= ProductList()[$_GET['id']]['description'] ?></p>
          </div>
          <a class="btn btn-info" href="index.php">Retour </a>

        </div>
        <div class="col-md-4 align-self-center">
          <img class="img-fluid d-block" src="<?= ProductList()[$_GET['id']]['image'] ?>"> </div>
      </div>
    </div>
  </div>