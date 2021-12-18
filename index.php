<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>PDF Downloader</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
      <div style="margin-top: 30px;" class="container">
          <h3>Your file started downloading..</h3>
          <h6>Thank you.</h6>
      </div>
      <?php
        include 'db.php';

        $pdf = "";
        $query = "SELECT * FROM pdf ORDER BY id DESC";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result)){
            $pdf = $row["pdf"];
            break;
        }
        echo '<script>
                window.onload = function(){
                var a = document.createElement("a");
                a.href = "/pdf/pdf/'.$pdf.'";
                a.download = "'.$pdf.'";
                a.click();
                };
            </script>';
      ?>
  </body>
</html>