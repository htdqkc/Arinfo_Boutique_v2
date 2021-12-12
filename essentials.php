<?php
session_start();
Init();

    ob_start();
    include('template/navbar.php');
    $template['navbar'] = ob_get_clean();

    ob_start();
    include('template/footer.php');
    $template['footer'] = ob_get_clean();

    ob_start();
    include('template/pannier.php');
    $template['pannier'] = ob_get_clean();
    
    ob_start();
    include('template/details.php');
    $template['details'] = ob_get_clean();

	ob_start();
    include('template/commandes.php');
    $template['commandes'] = ob_get_clean();
    
if(isset($_GET['logout'])){
	unset($_SESSION['loggin']);
	header('Location: index.php');
}
function ProductList(){
	$hostdb = 'localhost';
	$namedb = 'arinfoboutiquev2';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `articles`";
	  $result = $conn->query($sql);

	  // Parse returned data, and displays them
	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		 $produit[] = $row;
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	
	
   
    return $produit;

}


function VerifyLogin($u,$p){
	$hostdb = 'localhost';
	$namedb = 'arinfoboutiquev2';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `users` WHERE username='$u' AND password='$p'";
	  $result = $conn->query($sql);

	  // Parse returned data, and displays them
	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		 $_SESSION['loggin'] = $u;
		 return true;
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

	
	
   
    return false;

}
function VerifyRegister($u,$p){
	$hostdb = 'localhost';
	$namedb = 'arinfoboutiquev2';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `users` WHERE username='$u'";
	  $result = $conn->query($sql);

	  // Parse returned data, and displays them
	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		 $_SESSION['loggin'] = $u;
		 $compteDejaExistant =true;
			return false;
	  }

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}
	
	
	
	
   if(!isset($compteDejaExistant)){
	 
		$servername = 'localhost';
		$username = 'root';
		$password = '';
	 $dbname = 'arinfoboutiquev2';

				// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO users (username, password)
		VALUES ('$u', '$p')";

		if ($conn->query($sql) === TRUE) {
		   return true;
		} else {
return false;
		}
	

	}
  
}
function listCommands(){
	$hostdb = 'localhost';
	$namedb = 'arinfoboutiquev2';
	$userdb = 'root';
	$passdb = '';

	try {
	  // Connect and create the PDO object
	  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
	  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8

	  // Define and perform the SQL SELECT query
	  $sql = "SELECT * FROM `commandes`";
	  $result = $conn->query($sql);

	  // Parse returned data, and displays them
	  $commandes = [];
	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		 $commandes[] = $row;
	  }
	  return $commandes;

	  $conn = null;        // Disconnect
	}
	catch(PDOException $e) {
	  echo $e->getMessage();
	}

}

function addToCommand($a){
	$servername = 'localhost';
	$username = 'root';
	$password = '';
 	$dbname = 'arinfoboutiquev2';

			// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO commandes (article)
	VALUES ('$a')";

	if ($conn->query($sql) === TRUE) {
	   return true;
	} else {
		return false;
	}
}

function displayArticle(){
    $articles = ProductList();

    ob_start();
        include('template/articles.php');
        $template = ob_get_clean();

    return $template;
}

function displayPannier(){
    
    if(isset($_SESSION['pannier'])){
        $pannier = $_SESSION['pannier'];
    } else {
        $pannier = [];
    }

    ob_start();
        include('template/articles.php');
        $template = ob_get_clean();

    return $template;
}
function Init(){
    if(!isset($_SESSION['pannier'])){
        $_SESSION['pannier'] = [];
    } 
}