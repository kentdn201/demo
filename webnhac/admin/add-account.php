<!doctype html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
      <?php
      include("inc/header.php");
      require_once("inc/conn.php");
      ?>
      <style>
        .add-song{
              border: 2px solid black;
              padding-left: 5px;
              color: black;
        }
        .form input{
          width:100%;
          display: inline-block;
          float:none;
          padding:10px;
        }

        .form label{
          width:100%;
          display: inline-block;
        }

        .form textarea{
          width:100%;
          display: inline-block;
          padding:10px;
        }
      </style>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <div>
          <?php
            if( $_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = " INSERT INTO account( username, password) VALUES (?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param( $stmt, "ss", $username, $password);

            //s = string
            // d = double
            // i = interger
            if( mysqli_stmt_execute( $stmt )){
            echo "Add Success";
            }
            else{
            echo "Error: ". mysqli_error($conn);
            }
          }
          ?>
      <div id="main" class="add-song">
        <form class="form" method="post">

          <label>Input username</label>
          <input type="text" placeholder="Enter username" name="username">


          <label>Input password</label>
          <input name="password" placeholder="Enter password" type="text">

          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
          </form>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>