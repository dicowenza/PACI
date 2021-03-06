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

    function humanTiming ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'an',
            2592000 => 'mois',
            604800 => 'semaine',
            86400 => 'jour',
            3600 => 'heure',
            60 => 'minute',
            1 => 'seconde'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }


    $usrLogged = isset($_SESSION["started"]) && $_SESSION["started"] == "true";
    for ($i = 0; $i < count($_SESSION['row']); $i++)
    {
      $faq = $_SESSION['row'][$i];
      $faqID = $faq["faq_ID"];
      $faqText = utf8_encode($faq["faq_question"]);
      $nbAnswer = $faq["nbr"];
      echo '
      <button align="center" style="width:80%; white-space: normal; margin: 1%; padding : 3%; font-size: 18pt ! important;" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#' . $faqID . '">';

      if ($_SESSION["user_isModerator"] == 1 || ($_SESSION["user_ID"] == $faq["faq_user_ID"] && $usrLogged)
            || (isset($_GET["my_questions"]) && $_GET["my_questions"] == "true")) 
                echo '<a style="text-align:left;float:left;" href="../controleurs/delete_question_controleur.php?faqID='.$faqID.'"><h1 class="glyphicon glyphicon-remove-sign fa-5x"></h1></a>';

      $date = strtotime($faq["faq_date"]);
      $now = new DateTime();
      $faqUsr = ($_SESSION["user_ID"] == $faq["faq_user_ID"] && $usrLogged) ? "ma propre personne" : ($faq["user_nickname"].($faq["user_isModerator"] == 1 ? " <b>[MODERATEUR]</b>" : ""));
      echo '' . $faqText . '
      <br/><br /><p class="modal-title" style="font-size: 13pt ! important;"><i>' .('Il y a '.humanTiming($date).' par ').$faqUsr.(($nbAnswer > 0) ? '. <b>' : '. ') . $nbAnswer . ' réponse(s)</b></i></p>
      </button>
      <div style="padding-top: 5%" id="'.$faqID.'" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="font-size: 23pt ! important;">' . $faqText . '</h4>
            </div>
            <div class="modal-body">';
      if ($nbAnswer == 0) echo '<p style="font-size: 15pt ! important;"><i>Aucune réponse pour le moment.</i></p>';
        else
          {
          for ($j = 0; $j < count($_SESSION['faq_answers'][$i]); $j++)
              {
              $asw = $_SESSION['faq_answers'][$i][$j];
              $AswDate = strtotime($asw["answer_date"]);
              if ($usrLogged && ($asw["answer_user_ID"] == $_SESSION["user_ID"] || $_SESSION["user_isModerator"] == 1))
                  echo '<a style="margin-left: 10px;text-align:left;float:left;" href="../controleurs/deleteAnswer_controleur.php?answerID=' . $asw["answer_ID"] . '&faqID=' . $faqID . '"><h2 class="glyphicon glyphicon-remove-sign fa-5x"></h2></a>';
              
              if (!$usrLogged || ($usrLogged && $asw["answer_user_ID"] != $_SESSION["user_ID"]))
                  {
                  $lk = $usrLogged ? ('../controleurs/insertNote_controleur.php?answerID='.$asw["answer_ID"].'&userID='.$_SESSION["user_ID"].'&faqID='.$faqID) : 'connexion_vue.php';

                  echo '<div align="center" style="text-align:center;"><div style="display:block;margin-left: 20px;float:left;line-height:38px;">
                <a href="'.$lk.'&noteStatus=1"><span style="display:block;font-size: 20pt" class="glyphicon glyphicon-chevron-up fa-5x"></span></a>
                <span style="display:block;font-size: 15pt ! important;">'.(($asw['nbr'] == "")?'0':$asw['nbr']).'</span>
                <a href="'.$lk.'&noteStatus=-1"><span style="display:block;font-size: 20pt" class="glyphicon glyphicon-chevron-down fa-5x"></span></a>
              </div></div>';
                  }

              $usrAsw = $asw["user_nickname"].($asw["user_isModerator"] == 1 ? " <b>[MODERATEUR]</b>" : "");
              echo '<div style="padding:2%; outline: 1px solid">
                <p style="font-size: 15pt ! important;">' . utf8_encode($asw["answer_text"]) . '</p>
                <p class="modal-title" style="font-size: 13pt ! important;"><i>' .('Il y a '.humanTiming($AswDate)).' par ' . $usrAsw.'</i></p>
              </div><br />';
              }
          }
 
      echo '<form action="../controleurs/insertAnswer_controleur.php?faqID=' . $faqID . '" method="post">
                <textarea id="areaAnswer" name="answer" style="font-size: 15pt ! important;" rows="2" maxlength="500" class="form-control" onKeyUp="countChars(this, ' . $faqID . ')" placeholder="Répondez à l\'utilisateur ici" ></textarea>
                <h5 id="charCounter' . $faqID . '">500 caracteres</h5>
                <input type="hidden" id=faqID" name="faqID" value="' . $faqID . '">
            </div>
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