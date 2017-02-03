<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Mon ptit index</title>
</head>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
</script>

<body text-align="center">
  <?php include_once ("navbar.php"); ?>

  <h1 align="center">Consulter les questions ou poser la votre si vous ne la voyez pas</h1>


  <div align="center" style="margin: 15%">
    <?php

      try
      {
        $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }

      if (isset($_SESSION["started"]) && isset($_GET["my_questions"]) && $_SESSION["started"] == "true" && $_GET["my_questions"] == "true"){
        $req = $bdd->prepare("SELECT * FROM faq WHERE faq_user_ID = ".$_SESSION["user_ID"]);
      } else {
        $req = $bdd->prepare("SELECT * FROM faq");
      }      $req->execute();
      while($row = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<button style="white-space: normal; padding : 3%; font-size: 18pt ! important;" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">'.$row["faq_question"].'</button><br/>

        <!-- Modal -->
        <div style="padding-top: 15%" id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 23pt ! important;">'.$row["faq_question"].'</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;">'.$row["faq_answer"].'</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>

          </div>
        </div>';

      }

    ?>

    <br>
    <button style="white-space: normal;font-size: 35px ! important; width: 80%; height: 10%;" class="btn btn-success" type="button">POSER UNE QUESTION</button>
        <div id="addServiceForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 23pt ! important;">JE VEUX SAVOIR</h4>
          </div>
          <div class="modal-body">
             <div>
               <form class="addService">
               <fieldset>
                <br><ul class="nav nav-list">
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>La question intéressante</b></u></li><br>
                 <li><input style="font-size: 18pt ! important;" class="input-xlarge" type="text" name="title"></li><br><br>
                </ul><br><br>
               </fieldset>
               </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" id="submit">Envoyer</button>
            <button href="#" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
    <br><br>

  </div>

</body>
</html>