<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dash:lycée_classique_abidjan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/ionicons.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link rel="icon" href="images/favicon/favicon.png" type="image/x-icon">
  <!-- Online Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Martel+Sans:400,200,300,600,700,800,900|Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php include("config.php"); ?>
<!-- Wrap -->
<div id="wrap"> 
  
    <!-- header -->
    <header> 
      
      <!-- Logo -->
      <div class="container">
        <div class="logo"><img  class="img-responsive" src="images/logo.png" alt="" > </div>
        
        <!-- INFO -->
        <div class="top-info-con">
          <ul>
            
            <!-- Call Us Now -->
            <li>
              <div class="media-left">
                <div class="icon"> <i class="icon-call-in"></i></div>
              </div>
              <div class="media-body">
                <h6>Appeler nous </h6>
                <p>+ ( 255 ) 45 78 678 </p>
              </div>
            </li>
            
            <!-- Email us -->
            <li>
              <div class="media-left">
                <div class="icon"> <i class="icon-envelope-open"></i></div>
              </div>
              <div class="media-body">
                <h6>Notre email</h6>
                <p>lcd@mail.com</p>
              </div>
            </li>
            
            <!-- Opening Time -->
            <li>
              <div class="media-left">
                <div class="icon"> <i class="icon-clock"></i></div>
              </div>
              <div class="media-body">
                <h6>Heure de cours </h6>
                <p>Lun - vend : 9h à 19h</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Navigation -->
      <nav class="navbar">
        <div class="container">
          <ul class="nav ownmenu">
            <li > <a href="index.html">Acceuil</a> </li>
            <li> <a href="#"> Eleve </a>
              <ul class="dropdown animated-3s fadeInRight">
                <li> <a href="addstudent.php">Ajouter un elève</a> </li>
                <li > <a href="listestudent.php">Lister les elèves</a> </li>
              </ul>
            </li>
            <li class="active"> <a href="#"> Classe </a>
              <ul class="dropdown animated-3s fadeInRight">
                <li> <a href="addclass.html">Ajouter une classe</a> </li>
                <li class="active"> <a href="listeclass.php">Lister les classes</a> </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- SUB BANNER -->
    <section class="sub-bnr">
      <div class="position-center-center">
        <div class="container"> <img src="images/sub-bnr-hr-up-contact.png" alt="" >
          <h4>MENU</h4>
          <ol class="breadcrumb">
            <li><a href="#">Acceuil</a></li>
            <li class="active">Liste des classes</li>
          </ol>
          <img src="images/sub-bnr-hr.png" alt="" > </div>
      </div>
    </section>
  
    <!-- Content -->
    <div id="content"> 
      
      <!-- CONTACT -->
      <section class="contact-page padding-top-0"> 
        
        <!-- CONTACT FORM -->
        <div class="container">
          <div class="row margin-top-100 margin-bottom-100">
            <div class="col-md-10 col-sm-10 col-xs-12"> 
            <!-- Heading -->
            <div class="x_content">
            <div class="heading text-left">
                <h5>Liste des classes.</h5>
                <p>Cliquez sur une option pour modifier ou supprimer la classe de votre choix</p>
              </div>
              <div id="deleteclasse_message" class="success-msg"> </div>
              <table  id="datatable-article" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width: 20%;text-align: center;">#</th>
                    <th style="width: 30%;">Nom de la classe</th>
                    <th style="width: 20%;">Date</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "projet_edacy";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                      die("Pas de connection: " . mysqli_connect_error());
                    }

                    $sql = "SELECT id_classe, nom, day FROM classe ORDER BY id_classe ASC LIMIT 0, 10";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                        
                          ?>
                          <tr class="<?php echo ($row["id_classe"]);?>">
                          <td ><?php echo ($row["id_classe"]);?></td>
                          <td ><?php echo ($row["nom"]);?></td>
                          <td ><?php echo ($row["day"]);?></td>
                          <td ><p><a href="changeclasse.php?id=<?php echo ($row["id_classe"]);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier </a></p><p>  <button  class="btn btn-info btn-xs" onClick="deletec(<?php echo ($row["id_classe"]);?>);"><i class="ion-ios-arrow-thin-right"></i> Supprimer </button></p></td>
                          </tr>
                        <?php
                        }
                    } else {
                      echo "0 results";
                    }

                    mysqli_close($conn);
                  ?>
                
                </tbody>
              </table>
              <!-- end project list -->
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  
    <!--======= FOOTER =========-->
    <footer>
      <div class="container"> 
        <div class="footer-info">
          <div class="container">
            <div class="row"> 
              
              <!-- About -->
              <div class="col-md-4 col-sm-12 col-xs-12"> <img class="margin-bottom-30" src="images/logo.png" alt="logo" >
                <p>Application de gestion<br>
                <p>Le Lycée d’Excellence d’Abidjan </p>
              </div>
              
              <!-- Service provided -->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <h6>Notre service</h6>
                <ul class="links">
                  <li> <a href="addstudent.php">Ajouter un elève</a> </li>
                  <li> <a href="listestudent.php">Lister les elèves</a> </li>
                  <li> <a href="addclass.html">Ajouter une classe</a> </li>
                  <li> <a href="listeclass.php">Lister les classes</a> </li>
                </ul>
              </div>
              
              <!-- Quote -->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <h6>Un message</h6>
                <div class="quote">
                  <form>
                    <input class="form-control" type="text" placeholder="Nom">
                    <input class="form-control" type="text" placeholder="Telephone">
                    <textarea class="form-control" placeholder="Messages"></textarea>
                    <button type="submit" class="btn">Envoyer nous maintenant<span><i class="ion-ios-arrow-thin-right"></i></span></button>
                  </form>
                </div>
              </div>
            </div>
            
            <!--======= Footer Info =========-->
            <div class="foot-info-con">
              <ul class="row">
                
                <!-- Call Us Now -->
                <li class="col-md-4 col-sm-6 col-xs-6">
                  <div class="media-left">
                    <div class="icon"> <i class="icon-call-in"></i></div>
                  </div>
                  <div class="media-body">
                    <h6>Appeler nous </h6>
                    <p>+ ( 225 ) 45 78 678 </p>
                  </div>
                </li>
                
                <!-- Email us -->
                <li class="col-md-4 col-sm-6 col-xs-6">
                  <div class="media-left">
                    <div class="icon"> <i class="icon-envelope-open"></i></div>
                  </div>
                  <div class="media-body">
                    <h6>Ecrivez nous</h6>
                    <p>lcd@mail.com</p>
                  </div>
                </li>
                
                <!-- Opening Time -->
                <li class="col-md-4 col-sm-6 col-xs-6">
                  <div class="media-left">
                    <div class="icon"> <i class="icon-printer"></i></div>
                  </div>
                  <div class="media-body">
                    <h6>Heure de cours </h6>
                    <p>Lun - vend : 9h à 19h</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <!--======= RIGHTS =========-->
    <div class="rights">
      <div class="container">
        <p>Copyrights &copy; 2018  tout droit réservé </p>
      </div>
    </div>
  </div>
  <script src="js/jquery-1.12.4.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/own-menu.js"></script> 

  <!-- RS5.0 Core JS Files -->
  
  <script  src="js/jquery.themepunch.tools.min.js?rev=5.0"></script>
  <script  src="js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
  <script  src="js/revolution.extension.actions.min.js"></script>
  <script  src="js/revolution.extension.carousel.min.js"></script>
  <script  src="js/revolution.extension.kenburn.min.js"></script>
  <script  src="js/revolution.extension.layeranimation.min.js"></script>
  <script  src="js/revolution.extension.migration.min.js"></script>
  <script  src="js/revolution.extension.navigation.min.js"></script>
  <script  src="js/revolution.extension.parallax.min.js"></script>
  <script  src="js/revolution.extension.slideanims.min.js"></script>
  <script  src="js/revolution.extension.video.min.js"></script>

  <!-- my script--> 
  <script src="js/main.js"></script>

</body>
</html>
