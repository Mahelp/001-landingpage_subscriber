<?php

ini_set('display_errors',1);

$bdd = new PDO('mysql:host=marochelkimahelp.mysql.db:3306;dbname=marochelkimahelp', 'marochelkimahelp', 'm956ZvGu7ReA');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$bdd->exec('SET NAMES utf8');


 
  $nom = strip_tags($_GET['nom']);
  $url = strip_tags($_GET['url']);
  $email = strip_tags($_GET['email']);

 
 
 
 //echo $nom;echo $url;echo $email;


    $req = $bdd->prepare('INSERT INTO compte (nom, url, email) VALUES (:nom, :url, :email)');
    
	if ($req->execute(['nom'=>$nom, 'url'=>$url, 'email'=>$email]))
	  $success ="ok";
	  else 
	 $success ="no";



	 
    $req->closeCursor();
    
    //unset($nom, $url, $email);
   
 
    // envoyer un mail
    $destinataire='d.yassine2008@gmail.com';
    $objet='NEW INSERT LANDINGPAGE';
    $message='TOD TODO!!';
    $headers='Content-Type: text/html; charset=iso-8859-1';
     mail($destinataire, $objet, $message, $headers);
    //fin envoie de mail
 
 
 
 /*

$req = $bdd->prepare('SELECT * FROM compte ORDER BY id DESC');
$req->execute();
$compte = $req->fetchAll(PDO::FETCH_OBJ);
$req->closeCursor();




$servername = "";
$username = "";
$password = "";
$dbname = "installazqcvcart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO compte (nom, url, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

*/

//$success =  "العملية تمت بنجاح سيتم اضافت المشتركين في قناتك في 24 ساعة...شكرا علي الاشتراك ";


$getvalues[0]=array("message"=>$success);



$reponse=$_GET["jsoncallback"]."(" .json_encode($getvalues). ")";
//$reponse="(" .json_encode($getvalues). ")";


  echo $reponse;

  

?>