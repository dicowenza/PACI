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
  function showArea(identifiant) {
   document.getElementById(identifiant).style.display = "block";
  }
</script>

<body text-align="center">
  <?php include_once ("navbar.php"); ?>

  <div align="center">
    <h1 style="width:80%;padding:2%; background:#00E676;color:#37474F" align="center">CONSULTEZ LES QUESTIONS OU POSER LA VOTRE</h1>
  </div>


  <div align="center">
    <?php

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $req = $bdd->prepare("SELECT *, count(answer_ID) AS nbr FROM `faq` LEFT JOIN answer_faq ON faq_ID = answer_faq_id GROUP BY faq_ID");
      }
      $req->execute();

      while($row = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <button align="center" style="width:80%; white-space: normal; margin: 1%; padding : 3%; font-size: 18pt ! important;" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#'.$row["faq_ID"].'">';
          if ($_SESSION["user_ID"] == $row["faq_user_ID"] && isset($_SESSION["started"]) && $_SESSION["started"] == "true" || (isset($_GET["my_questions"])  && $_GET["my_questions"] == "true"))
            echo '<a style="text-align:left;float:left;" href="deleteQuestion.php?faqID='.$row["faq_ID"].'"><h1 class="glyphicon glyphicon-remove-sign fa-5x"></h1></a>';
          
          $date = new DateTime($row["faq_date"]);
          $now = new DateTime();
          
          echo ''.$row["faq_question"].'
        <br><br><p class="modal-title" style="font-size: 13pt ! important;"><i>'.$date->diff($now)->format('Il y a %d jours').'. Aucune réponse(s)</i></p>
        </button>
        <!-- Modal -->
        <div style="padding-top: 15%" id="'.$row["faq_ID"].'" class="modal fade " role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 23pt ! important;">'.$row["faq_question"].'</h4>
              </div>
              <div class="modal-body">';
                if($row["nbr"] == 0)
                  echo '<p style="font-size: 15pt ! important;"><i>Aucune réponse pour le moment.</i></p>';
                else{
                  $AswReq = $bdd->prepare("SELECT answer_faq.*, user_nickname FROM answer_faq LEFT JOIN user on user_ID = answer_user_ID WHERE answer_faq_ID = ".$row["faq_ID"]." GROUP BY answer_ID");
                  $AswReq->execute();
                  while($asw = $AswReq->fetch(PDO::FETCH_ASSOC)){
                    $AswDate = new DateTime($asw["answer_date"]);
                    if($asw["answer_user_ID"] == $_SESSION["user_ID"])
                      echo '<a style="margin-left: 10px;text-align:left;float:left;" href="deleteAnswer.php?answerID='.$row["answer_ID"].'"><h2 class="glyphicon glyphicon-remove-sign fa-5x"></h2></a>';
                    echo '<div style="padding:2%; outline: 1px solid">
                      <p style="font-size: 15pt ! important;">'.$asw["answer_text"].'</p>
                      <p class="modal-title" style="font-size: 13pt ! important;"><i>'.$AswDate->diff($now)->format('Il y a %d jours').' par '.$asw["user_nickname"].'</i></p>
                    </div><br>';
                  }
                }
              echo '<form action="insertAnswer.php" method="post">
              <textarea id="answer" name="answer" style="'/*display:none;*/.' font-size: 15pt ! important;" rows="2" class="form-control" placeholder="Répondez à l\'utilisateur ici"></textarea>
              <input type="hidden" id=faqID" name="faqID" value="'.$row["faq_ID"].'">';
              echo '</div>
              <div class="modal-footer">
                <input class="btn btn-success" type="submit" value="Répondre">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>';
      }

    ?>

    <br>
    <button style="font-size: 35px ! important;  width: 80%; height: 10%;" class="btn btn-success" type="button" data-toggle="modal" data-target="#addQuestionForm" >POSER UNE QUESTION</button>
    <div id="addQuestionForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 23pt ! important;">JE VEUX SAVOIR</h4>
          </div>
          <div class="modal-body">
             <div>
               <form class="addQuestion" method="post" action="insertQuestion.php">
               <fieldset>
                <br><ul class="nav nav-list">
                 <br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>La fameuse question :</b></u></li><br>
                 <li><input type="textarea" name="question" style="font-size: 18pt ! important; size: 50px;" rows="5" class="input-xlarge"></li>
                </ul><br><br>
               </fieldset>
               <div class="modal-footer">
                <input type="submit" value="Valider" class="btn btn-success" id="submit"/>
                <button href="#" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              </div>
               </form>
          </div>
        </div>

      </div>
    </div>
    <br><br>

  </div>

</body>
</html>
