<?php
include  'includes/cnx.php';

if(!empty($_POST))
{
  extract($_POST);
  $nom = strip_tags($nom);
  $url = strip_tags($url);
  $email = strip_tags($email);


   $errors = array();
  if(empty($nom)){
    array_push($errors, 'الاسم ضروري ');
  }
  
  if(empty($url)){
    array_push($errors, 'رابط القناة ضروري ');
  }

  // s'assurer que l'url est au bon format exemple:  
   // 1 doit contenir (youtube.com)-->$p1  et (channel)-->$p2
   // 2 et ne pas contenir watch?-->$p3

  /* 
  $mot = $url;
  $str = "youtube.com";
  // Teste si la chaîne contient le mot
  $p1=strrchr($mot,$str);

  if ($p1<>'youtube.com')
  {
  $flag=0;
  }

     
   
   $p1= strstr($url,'youtube.com');
   if ($p1<>'youtube.com')
   {
   array_push($errors, 'رابط القناة غيرصحيح ');
   }
   */
   // fin controle url

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, 'البريد الالكتروني ضروري----');
  }
  
  if(count($errors) == 0)
   {
 
    sleep(10);
    
    // Stoppe pour 10 secondes
    //sleep(10);

    $req = $bdd->prepare('INSERT INTO compte (nom, url, email) VALUES (:nom, :url, :email)');
    $req->execute(array(':nom'=>$nom, ':url'=>$url, ':email'=>$email));
    $req->closeCursor();
    $success =  'العملية تمت بنجاح سيتم اضافت المشتركين في قناتك في 24 ساعة...شكرا علي الاشتراك  ';
    unset($nom, $url, $email);
    
 
    // envoyer un mail
    $destinataire='d.yassine2008@gmail.com';
    $objet='NEW INSERT LANDINGPAGE';
    $message='TOD TODO!!';
    $headers='Content-Type: text/html; charset=iso-8859-1';
//     mail($destinataire, $objet, $message, $headers);
    //fin envoie de mail 
  
  }
}

$req = $bdd->prepare('SELECT * FROM compte ORDER BY id DESC');
$req->execute();
$compte = $req->fetchAll(PDO::FETCH_OBJ);
$req->closeCursor();


 ?>



<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>اشترك واربح</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
    body{
      padding-top: 50px;
    }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  
  <div class="jumbotron" > 
   <h1 style="text-align:center"> اشترك واربح 5 مشتركين مجانا علي قناتك في اليوتوب</h1>
   <p style="text-align:center">الخدمة مجانية و صادقة لمساعدة اصحاب القنواة الصغيرة</p>
  
   <h2 style="text-align:center" class="text-danger"> <g>       تنبيه  </g>                     
   <u>لا نقوم بالخدمة اذا كانت القناة تحتوي علي محتويات غير مسموح بها<h2></u>
   
   </div>
 

  
  
  
  



    <div class="container">

     
     <?php 
     if(!empty($errors)):?>
      <div class="alert alert-danger">
     <?php foreach($errors as $e):?>
      <p><?=$e;?></p>      
      <?php endforeach; ?>
      </div>
      <?php endif?>
    
     
      <p id="demo" style="display:none;"></p>
     

      
      <?php if(isset($success)):?>
     
      <div class="alert alert-success"><?=$success;?></div>
      <?php endif;?>


        
    
      <br><br>
      <form id="form_00" action="index.php" method="post" style="text-align:center">
      <input type="submit" id="submit2" class="btn btn-warning" value="اضغط لتاكيد علي ان القناة  لا تحتوي علي محتويات غير مسموح بها ">
      <br><br>
      </form>
      <form id="form" action="index.php" method="post">
     
     
    <input type="text" name="nom" value="<?=isset($nom) ? $nom : false;?>" id="nom" placeholder="ادخل الاسم" class="form-control">
     <br><br>
    
     <input type="text" name="url" value="<?=isset($url) ? $url : false;?>" id="url" placeholder="ادخل رابط قناتك" class="form-control">
     <br><br>

     <input type="text" name="email" value="<?=isset($email) ? $email : false;?>" id="email" placeholder="ادخل البريد الالكتروني" class="form-control">
     <br><br>
          
     <br>
     <div class="col text-center">
     <input type="submit" id="submit" class="btn btn-primary" class="col-lg-12"  value="اشتراك">
      <div>
     </form>  

     
     <br><br>

     <div class="row">
  
<div class="col-sm-2"><img src="img/partenaire1.jpg" class="img-responsive" alt="Cinque Terre"></div>
<div class="col-sm-2"><img src="img/partenaire3.jpg" class="img-responsive" alt="Cinque Terre"></div>
<div class="col-sm-2"><img src="img/partenaire4.jpg" class="img-responsive" alt="Cinque Terre"></div>
<div class="col-sm-2"><img src="img/partenaire3.jpg" class="img-responsive" alt="Cinque Terre"></div>
<div class="col-sm-2"><img src="img/partenaire4.jpg" class="img-responsive" alt="Cinque Terre"></div>
<div class="col-sm-2"><img src="img/partenaire1.jpg" class="img-responsive" alt="Cinque Terre"></div>

  


</div>



     <br><br>
    
     
     
     
<div class="row">
  
    <div class="col-sm-2">
  <!-- 1. The <iframe> (video player) will replace this <div> tag. -->

<div id="player"></div>

<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      width: '1',
      height: '1',
      videoId: 'oWyuAa3kjYw',
      playerVars: { 'autoplay': 1, 'playsinline': 1 },
      events: {
        'onReady': onPlayerReady
      }
    });
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    event.target.mute();
    event.target.playVideo();
  }
</script>
</div>
  


  
  <div class="col-sm-2">
<!--video a mettre-->
</div>
  
  
  
  
  
  
  
  <div class="col-sm-2">
  <!--video a mettre-->
  </div>
  
  
  
  
  
  
  
  
  <div class="col-sm-2">
  <!--video a mettre-->
  </div>

  
  
  
  
  
  
  
  
  
  
  
  <div class="col-sm-2">
  <!--video a mettre-->
  </div>
  
  
  
  
  
  
  
  
  <div class="col-sm-2">
  <!--video a mettre-->
  </div>






     
      
   <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright
   
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->




    </div><!-- /.container -->


 






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

    <script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
   document.getElementById("demo").innerHTML = "<h1 style=\"text-align:center\">العملية في طور الانجاز ... انتظار 1 دقيقة</h1> "+"<br><h1 style=\"text-align:center\">"+ d.getSeconds();+"</h1>"
  }
</script>


  </body>
</html>
