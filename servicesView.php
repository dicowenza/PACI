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

  <div align="center" style="margin-top: 15%">

    <?php

      try
      {
        $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }

      $req = $bdd->prepare("SELECT * FROM service");
      $req->execute();
      while($row = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <div id="myModal">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="font-size: 23pt ! important;">'.$row["service_title"].'</h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 18pt ! important;">'.$row["service_description"].'</p>
              </div>
              <div class="modal-footer">
                <p style="font-size: 13pt ! important;">Valable du '.$row["service_date"].' jusqu\'au '.$row["service_delay"].'</p>
              </div>
            </div>

          </div>
        </div>';

      }

    ?>

    <br>
    <button style="font-size: 35px ! important; width: 500px; height: 100px;" class="btn btn-success" type="button">PROPOSER MES SERVIVES</button>
    <br><br>

  </div>

</body>
</html>