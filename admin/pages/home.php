<?php session_start();
if (!isset($_SESSION["admin-username"])){
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a style="margin-left: 10px;" class="navbar-brand" href="#">Admin Area</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
              </li>
              <?php
                echo '<li class="nav-item">
                        <a class="nav-link" href="#">'.$_SESSION["admin-username"].'</a>
                      </li>';
              ?>
              <li class="nav-item">
                <a class="nav-link" href="../php/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      <!-- Navbar End -->
  
      <div class="container">
        <div class="row">

            <!-- New PDF -->
            <div class="card" style="width: 25rem;">
              <h4>Add a new PDF file</h4>
              <form action="../php/add-pdf.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleInputEmail1">File Name</label>
                      <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter File Name"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date Added</label>
                    <input name="date" type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Time Added</label>
                    <input name="time" type="time" class="form-control" id="exampleInputEmail1" placeholder="Enter Time"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">PDF File</label>
                    <input name="pdf" type="file" class="form-control" id="exampleInputEmail1" placeholder="Upload PDF"/>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- New Movie End -->

            <!-- New Admin -->
            <div class="card" style="width: 25rem;">
              <h4>Add a new Admin User</h4>
              <form action="../php/new-admin.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Password"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input name="cpassword" type="text" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password"/>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- New Admin End -->
  
        </div>
        <!-- All PDF List -->
        <div style="margin-top: 100px; margin-bottom: 50px;" class="container">
          <div class="table-style">
            <h2 class="text-center">List of movies we have</h2>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">File Name</th>
                  <th scope="col">Date added</th>
                  <th scope="col">Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../php/db.php';
                $query = "SELECT * FROM pdf";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result)){
                      echo '<tr>
                              <th scope="row">'.$row["id"].'</th>
                              <td><img id="img-preview" src="../../uploads/'.$row["name"].'"/></td>
                              <td>'.$row["date"].'</td>
                              <td>'.$row["time"].'</td>
                              <td><a href="../../pdf/'.$row["name"].'" class="btn btn-primary">Download</a></td>
                            </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </body>
</html>