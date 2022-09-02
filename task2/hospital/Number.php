<?php 
session_start();
$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST['phone'])){
        $errors['phone'] = "<div class='alert alert-danger p-2' role='alert'>The Phone Is Required !</div>";
    }
    if(empty($errors)){
        $_SESSION['phone'] = $_POST['phone'];
        header("location:Review.php");
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Review</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .bg-color {
            background: #07095F;
        }

        .outline-color {
            outline: #07095F;
        }

        .border-color {
            border-color: #07095F !important;
        }

        .color {
            color: #07095F;
        }

        h1 {
            font-size: 3.5rem;
        }
    </style>
  </head>
  <body>

  <div class="container py-2">
        <h1 class="text-center color fw-bolder">Bank</h1>
        <div class="row">
            <div class="col-8 offset-2 px-5 py-2 mh-100">
                <form method="POST" action="" class="fw-bolder w-100 color my-5">
                    <div class="form-group text-left py-3 fs-5">
                        <label for="phone">User Phone : </label>
                        <input type="tel" class="form-control my-3 p-2" id="phone" name="phone"
                            value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                    </div>
                    <?= isset($errors['phone']) ? $errors['phone'] : '' ?>
                    <div class="form-group text-center py-3">
                        <button type="submit" class="btn btn-block btn-lg bg-primary text-white ">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>



  <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>