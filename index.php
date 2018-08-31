<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">

    <title>Tema para a festa</title>
  </head>
  <body>
    <div class="container">
      <div class="top">
        <h2>Tema para a festa de fim de ano.</h2>
      </div>

      <div id="chart_div"></div>

      <div id="start" class="form">
        <div class="card-title">TEMAS</div>
           <form method="post" action="send.php">
        <td>
              <div class="form-check">
                <input type="radio" name="temas" class="form-check-input" value="1">
                <label class="form-check-label">Circo</label>
                 </div>
                <div class="form-check">
                <input type="radio" name="temas" class="form-check-input"value="2">
                <label class="form-check-label">Cinema</label>
                 </div>
                <div class="form-check">
                <input type="radio" name="temas" class="form-check-input" value="3">
                <label class="form-check-label">Medieval</label>
              </div>
              <div class="sub">
            <button type="submit" name="enviar" class="btn btn-secondary">Enviar</button>
            </div>
        </td>
    </form>
      </div>

    <div class="results">
      <div class="card-title">VOTOS</div>
<?php
    include "conecta.php";


    $sql = "SELECT ID, temas FROM temas";
    $result = $conexao->query($sql);

    $circo = 0;
    $cinema = 0;
    $medieval = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            switch ($row["temas"]) {
                case 1:
                    $circo++;
                    break;
                case 2:
                    $cinema++;
                    break;
                case 3:
                    $medieval++;
                    break;
                default:
                    break;
            }
        }
        echo "<p> Circo: $circo <p/><p> Cinema: $cinema <p/><p> Medieval: $medieval<p/>";
    } else {
        echo "0 results";
    }
    $conexao->close();
?> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

    var data = google.visualization.arrayToDataTable([
         ['VOTOS', '', { role: 'red' }],
         ['Circo', <?php echo "$circo"; ?>, ''],            // RGB value
         ['Cinema', <?php echo "$cinema"; ?>, ''],            // English color name
         ['Medieval', <?php echo "$medieval"; ?>, ''],
      ]);
        // Set chart options
        var options = {'title':'',
                        'isStacked':'false',
                        'width':350,
                        'height':250};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    </div>
   </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
