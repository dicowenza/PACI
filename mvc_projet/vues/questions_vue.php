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
      for($i = 0; $i< count($_SESSION['row']); $i++ ){
        echo '<button style="white-space: normal; margin: 3%; padding : 3%; font-size: 18pt ! important;" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#'.$_SESSION['row'][$i]["faq_ID"].'">'.$_SESSION['row'][$i]["faq_question"].'</button><br/>

        <!-- Modal -->
        <div style="padding-top: 15%" id="'.$_SESSION['row'][$i]["faq_ID"].'" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 23pt ! important;">'.$_SESSION['row'][$i]["faq_question"].'</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;">'.$_SESSION['row'][$i]["faq_answer"].'</p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addAnswerForm">Répondre</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>';

      }

    ?>

    <div id="addAnswerForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 23pt ! important;">JE VEUX REPONDRE</h4>
          </div>
          <div class="modal-body">
             <div>
               <form class="addAnswer" method="post" action="insertAnswer.php">
               <fieldset>
                <br><ul class="nav nav-list">
                 <br><br>
                 <li style="font-size: 18pt ! important;" class="nav-header"><u><b>La fameuse réponse :</b></u></li><br>
                 <li><input type="textarea" name="answer" style="font-size: 18pt ! important; size: 50px;" rows="5" class="input-xlarge"></li>
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
  </div>

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