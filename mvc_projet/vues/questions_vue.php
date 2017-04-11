<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="bootstrap/js/jquery.js"></script>
  <script src="../js/jqscript.js"></script>
  <title>Mon ptit index</title>
</head>

<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">

  function countChars(e, counter) {
    document.getElementById("charCounter" + counter).innerHTML = "Reste " + (500 - e.value.length) + " caracteres";
  }

</script>

<body text-align="center">
  <?php include_once ("navbar.php"); ?>
  <div align="center">
    <h1 style="width:80%;padding:2%; background:#00E676;color:#37474F" align="center">CONSULTEZ LES QUESTIONS OU POSER LA VOTRE</h1>
  </div>
  <div align="center">
    <?php
    for($i = 0; $i< count($_SESSION['row']); $i++ ){
    $faqID = $_SESSION['row'][$i]["faq_ID"];
    echo '
    <button align="center" style="width:80%; white-space: normal; margin: 1%; padding : 3%; font-size: 18pt ! important;" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#'.$faqID.'">';
    if ($_SESSION["user_ID"] == $_SESSION['row'][$i]["faq_user_ID"] && isset($_SESSION["started"]) && $_SESSION["started"] == "true" || (isset($_GET["my_questions"])  && $_GET["my_questions"] == "true"))
    echo '<a style="text-align:left;float:left;" href="../controleurs/delete_question_controleur.php?faqID='.$faqID.'"><h1 class="glyphicon glyphicon-remove-sign fa-5x"></h1></a>';
    
    $date = new DateTime($_SESSION['row'][$i]["faq_date"]);
    $now = new DateTime();
    
    echo ''.utf8_encode($_SESSION['row'][$i]["faq_question"]).'
    <br><br><p class="modal-title" style="font-size: 13pt ! important;"><i>'.$date->diff($now)->format('Il y a %d jours').(($_SESSION['row'][$i]["nbr"] > 0) ? '. <b>' : '. ').$_SESSION['row'][$i]["nbr"].' réponse(s)</b></i></p>
    </button>
    <!-- Modal -->
    <div style="padding-top: 5%" id="'.$faqID.'" class="modal fade " role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-size: 23pt ! important;">'.utf8_encode($_SESSION['row'][$i]["faq_question"]).'</h4>
          </div>
          <div class="modal-body">';
            if($_SESSION['row'][$i]["nbr"] == 0)
            echo '<p style="font-size: 15pt ! important;"><i>Aucune réponse pour le moment.</i></p>';
            else{
            for($j = 0; $j< count($_SESSION['faq_answers'][$i]); $j++ ){
            $AswDate = new DateTime($_SESSION['faq_answers'][$i][$j]["answer_date"]);
            $logd = 1;
            if(isset($_SESSION["started"]) && $_SESSION["started"] == "true"){
            if($_SESSION['faq_answers'][$i][$j]["answer_user_ID"] == $_SESSION["user_ID"])
            echo '<a style="margin-left: 10px;text-align:left;float:left;" href="../controleurs/deleteAnswer_controleur.php?answerID='.$_SESSION['faq_answers'][$i][$j]["answer_ID"].'"><h2 class="glyphicon glyphicon-remove-sign fa-5x"></h2></a>';
            }else $logd = 0;
            if(!isset($_SESSION["started"]) && $_SESSION["started"] != "true" || ( isset($_SESSION["started"]) && $_SESSION["started"] == "true" && $_SESSION['faq_answers'][$i][$j]["answer_user_ID"] != $_SESSION["user_ID"])) {
            echo '<div align="center" style="text-align:center;"><div style="display:block;margin-left: 20px;float:left;line-height:38px;">
              <a href="'.(($logd == 0) ? 'connexion_vue.php' : ('../controleurs/insertNote_controleur.php?answerID='.$_SESSION['faq_answers'][$i][$j]["answer_ID"].'&userID='.$_SESSION["user_ID"].'&noteStatus=1&faqID='.$faqID)) .'"><span style="display:block;font-size: 20pt" class="glyphicon glyphicon-chevron-up fa-5x"></span></a>
              <span style="display:block;font-size: 15pt ! important;">'.(($_SESSION['faq_answers'][$i][$j]['nbr']=="") ? '0' : $_SESSION['faq_answers'][$i][$j]['nbr']).'</span>
              <a href="'.(($logd == 0) ? 'connexion_vue.php' : ('../controleurs/insertNote_controleur.php?answerID='.$_SESSION['faq_answers'][$i][$j]["answer_ID"].'&userID='.$_SESSION["user_ID"].'&noteStatus=-1&faqID='.$faqID)) .'"><span style="display:block;font-size: 20pt" class="glyphicon glyphicon-chevron-down fa-5x"></span></a>
            </div></div>';
            }
            echo '<div style="padding:2%; outline: 1px solid">
              <p style="font-size: 15pt ! important;">'.utf8_encode($_SESSION['faq_answers'][$i][$j]["answer_text"]).'</p>
              <p class="modal-title" style="font-size: 13pt ! important;"><i>'.$AswDate->diff($now)->format('Il y a %d jours').' par '.$_SESSION['faq_answers'][$i][$j]["user_nickname"].'</i></p>
            </div><br>';
            }
            }
            echo '<form action="../controleurs/insertAnswer_controleur.php?faqID='.$faqID.'" method="post">
              <textarea id="areaAnswer" name="answer" style="font-size: 15pt ! important;" rows="2" maxlength="500" class="form-control" onKeyUp="countChars(this, '.$faqID.')" placeholder="Répondez à l\'utilisateur ici" ></textarea>
              <h5 id="charCounter'.$faqID.'">500 caracteres</h5>
              <input type="hidden" id=faqID" name="faqID" value="'.$faqID.'">';
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
              <form class="addQuestion" method="post" action="../controleurs/insertQuestion_controleur.php">
                <fieldset>
                  <br><ul class="nav nav-list">
                    <br><br>
                    <li style="font-size: 18pt ! important;" class="nav-header"><u><b>La fameuse question :</b></u></li><br>
                    <li><input type="textarea" name="question" style="font-size: 18pt ! important; size: 50px;" rows="5" class="input-xlarge"></li>
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