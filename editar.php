<?php 
session_start();
?>
<?php
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b244f66c3942ac";
$password = "1ccc39e8";
$dbname = "heroku_7107136f272449a";  

$connect = new mysqli($servername, $username, $password, $dbname);


if(isset ($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);    
    $sql = " SELECT * FROM automoveis WHERE id = $id ";    
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($result);     
    (mysqli_connect_errno());
 }
 else {
        echo "falha de conexão.. " .mysqli_connect_error();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar Arquivo</title>
</head>

<body>
    <style>
        
    body {
        background-image: url('background.jpg');
        background-image: opacity 0.5;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    </style>
    <h1 class=" container justify-content-center"> Editar automóveis cadastrados</h1>
    <div class=" container justify-content-center">
        <?php 
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    ?>
    </div>

    <div class="container justify-content-center">
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Veículo</h2>
                </label>
                <div>
                    <input type="text" name="nome" class="form-control" value="<?php echo $data['nome'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>PLaca</h2>
                </label>
                <div>
                    <input type="text" name="placa" class="form-control" value="<?php echo $data['placa'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Chassi</h2>
                </label>
                <div>
                    <input type="text" name="chassi" class="form-control" value="<?php echo $data['chassi'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Montadora</h2>
                </label>
                <select name="montadora" class="form-control">
                    <div>
                        <?php                   
                        
                  $servername = "us-cdbr-east-04.cleardb.com";
                  $username = "b244f66c3942ac";
                  $password = "1ccc39e8";
                  $dbname = "heroku_7107136f272449a";  
                
                  $con = new mysqli($servername, $username, $password, $dbname);
                 
                  if (mysqli_connect_errno()) {
                      echo "falha de conexão.. " .mysqli_connect_error();
                  }

                  $sql = "SELECT * FROM montadoras";
                  $result = mysqli_query($con, $sql);                
                  
                  
                  echo "<option> Escolha uma montadora </option>";
                    while ($row = mysqli_fetch_array($result)){
                      echo"<option>$row[mont]</option>";
                    }                                     
                    mysqli_close($con);                    
                  ?>

                    </div>
                </select><br>

                <div class="form-group">
                    <input type="submit" value="Editar" name="editar" class="btn btn-primary  form-control">
                </div>
            </div>

        </form>
    </div>
