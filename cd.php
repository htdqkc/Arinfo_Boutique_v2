<?php
include('essentials.php');
?>
<ul>
<?php
foreach(listCommandsNU($_GET['id']
) as $k => $v){
    echo'<li>'.$v['quantite'].'x '.$v['title'].' '.$v['price']*$v['count'].'€ </li>';
}
?>
</ul>