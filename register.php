<?php
include('essentials.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://achlys.me/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="theme.css" type="text/css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="index.js"></script>
</head>

<body>
    <?php
    if(isset($_GET['remove'])){
        session_destroy();
        header('location: index.php');
    }
	if(isset($_POST['username'])){
		$u = addslashes(htmlspecialchars($_POST['username']));
		$p = addslashes(htmlspecialchars($_POST['password']));
		$error = "Compte deja existant";
		
		if(VerifyRegister($u,$p)){
			$error = "Vous êtes inscrit";

		}
	}
    ?>
    <?= @$template['navbar'] ?>

    <div class="app">
        <div class="form" style="position: relative;" wire:poll="interval">
            <div class="fields">
            </div>
            <form class="fields" method="post">

                <div class="inputbox">
                    <label for="email">Identifiant</label>
                    <input type="text" name="username" placeholder="username">
                </div>

                <div class="inputbox">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="password">
                </div>
                <p><?= @$error ?></p>


                <button id="loginBtn" class="submit" wire:click="submit">Inscription</button>



            </form>
        </div>



        <style>
            #qr {
                position: absolute;
                bottom: 0;
                left: 0;
            }

            .selectacc {
                background: var(--primary);
                padding: .5rem;
                color: white;
                margin-bottom: 2px;
            }
        </style>

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