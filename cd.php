<?php
include('essentials.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="theme.css" type="text/css">
    <script type="text/javascript" src="index.js" ></script>
</head>

<body>
    <?= @$template['navbar'] ?>


    <div style="display:flex;justify-content:center;flex-direction:column;min-height:80vh">
    <h1>Détail de votre commande</h1>
    <ul style="padding:2rem">
<?php
$prix = 0;
foreach(listCommandsNU($_GET['id']
) as $k => $v){
    $prix = $prix + $v['price'];
    echo'<li>'.$v['quantite'].'x '.$v['title'].' '.$v['price']*$v['count'].'€ </li>';
}
echo '<hr> Total : '. $prix .'€';
?>
</ul>
    </div>

<?= @$template['footer'] ?>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>

</html>