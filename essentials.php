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

if (isset($_GET['logout'])) {
	unset($_SESSION['loggin']);
	header('Location: index.php');
}
function ProductList()
{


	try {
		// Connect and create the PDO object
		$conn = pdo();
		// Define and perform the SQL SELECT query
		$sql = "SELECT * FROM `articles`";
		$result = $conn->query($sql);

		// Parse returned data, and displays them
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$produit[] = $row;
		}

		$conn = null;        // Disconnect
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	return $produit;
}

function pdo()
{
	$servername = "localhost";
	$username = "root";
	$password = "";


	try {
		$conn = new PDO("mysql:host=$servername;dbname=arinfoboutiquev2", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}


function VerifyLogin($u, $p)
{
	try {
		// Connect and create the PDO object
		$conn = pdo();
		// Define and perform the SQL SELECT query
		$sql = "SELECT * FROM `clients` WHERE email='$u' AND password='$p'";
		$result = $conn->query($sql);

		// Parse returned data, and displays them
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$_SESSION['loggin'] = $row;
			return true;
		}

		$conn = null;        // Disconnect
	} catch (PDOException $e) {
		echo $e->getMessage();
	}




	return false;
}
function addCommand($idclient, $id_article, $quantite, $num)
{

	// Create connection
	$conn = pdo();
	// Check connection

	$d = time();
	$uid = $_SESSION['loggin']['id'];
	$sql = "INSERT INTO commandes (numero, date, prix,user_id)
	VALUES ('$num','$d',1,'$uid')";

	$conn->query($sql);	

	$stmt = $conn->prepare("SELECT * FROM `commandes` ORDER by id DESC limit 1");
	$stmt->execute();

	// set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	foreach ($stmt->fetchAll() as $k => $v) {

		$command_id = $v['id'];

		$sql = "INSERT INTO commandes_articles (id_article,id_commande,quantite)
						VALUES ($id_article, $command_id, $quantite)";

		$conn->query($sql);
	}
}
function VerifyRegister($u, $p, $nom, $prenom)
{

	try {
		// Connect and create the PDO object
		$conn = pdo();

		// Define and perform the SQL SELECT query
		$sql = "SELECT * FROM `clients` WHERE email='$u'";
		$result = $conn->query($sql);

		// Parse returned data, and displays them
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$compteDejaExistant = true;
			return false;
		}

		$conn = null;        // Disconnect
	} catch (PDOException $e) {
		echo $e->getMessage();
	}



	if (!isset($compteDejaExistant)) {

		$conn = pdo();
		try {
			$conn = pdo();
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO clients (email, password, nom, prenom)
			VALUES ('$u', '$p','$nom','$prenom')";
			// use exec() because no results are returned
			$conn->exec($sql);
			header('location: login.php?e='.$u);
			return true;
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}
}
function listCommands()
{


	try {
		// Connect and create the PDO object
		$conn = pdo();
		$uid = $_SESSION['loggin']['id'];
		// Define and perform the SQL SELECT query
		$sql = "SELECT * FROM `commandes_articles` INNER JOIN commandes ON commandes_articles.id_commande = commandes.id INNER JOIN articles ON articles.id = commandes_articles.id_article WHERE user_id='$uid' GROUP BY numero ";
		$result = $conn->query($sql);

		// Parse returned data, and displays them
		$commandes = [];
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$commandes[] = $row;
		}
		return $commandes;

		$conn = null;        // Disconnect
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
function listCommandsNU($n)
{


	try {
		// Connect and create the PDO object
		$conn = pdo();
		// Define and perform the SQL SELECT query
		$sql = "SELECT * FROM `commandes_articles` INNER JOIN commandes ON commandes_articles.id_commande = commandes.id INNER JOIN articles ON articles.id = commandes_articles.id_article WHERE numero='$n'";
		$result = $conn->query($sql);

		// Parse returned data, and displays them
		$commandes = [];
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$commandes[] = $row;
		}
		return $commandes;

		$conn = null;        // Disconnect
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

function addToCommand($a)
{
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

function displayArticle()
{
	$articles = ProductList();

	ob_start();
	include('template/articles.php');
	$template = ob_get_clean();

	return $template;
}

function displayPannier()
{

	if (isset($_SESSION['pannier'])) {
		$pannier = $_SESSION['pannier'];
	} else {
		$pannier = [];
	}

	ob_start();
	include('template/articles.php');
	$template = ob_get_clean();

	return $template;
}
function Init()
{
	if (!isset($_SESSION['pannier'])) {
		$_SESSION['pannier'] = [];
	}
}
