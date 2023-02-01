<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header">
  <h1>LOGIN</h1>
  <p>Resize the browser window to see the responsive effect.</p>
</div>

<div class="topnav">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle">
    <!--<div class="parriva"></div>-->
    <?php //no se ha enviado el formulario aun
     if (!isset($_POST['submit'])) { ?>
    <div class="container">
        <form action="index.php" method="post">
          <div class="rowo">
              <div class="col-25">
                <label for="username">Username:</label>
              </div>
              <div class="col-75">
                <input type="text" id="username" name="username" placeholder="tu nombre">
              </div>
          </div>
          <div class="rowo">
            <div class="col-25">
              <label for="pwd">Password:</label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="pwd" placeholder="tu contraseña">
            </div>
          </div>
          <div class="rowo">
          <input type="submit" value="Submit">
          </div>
        </div>
        </form>
      <?php
          }else{
            
              //formulario enviado
              echo "Nombre: {$_POST['username']}";
              echo "<br>";
              echo "Apellidos: " . $_POST['pwd'] ."<br>";
            }
      ?>
    </div>
  
  <div class="column side">
  </div>
</div>
<div class="footer">
    <p>Footer</p>
  </div>
  
</body>
</html>
