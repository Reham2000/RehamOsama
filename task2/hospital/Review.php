<?php
session_start();
$questions = ['Are you satisfied with the cleanliness level?','Are you satisfied with the service prices?','Are you satisfied with the nursing service','Are you satisfied with the level of the doctor?','Are you satisfied with the calmness in the hospital?'];
$num = [0,3,5,10];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $flag = false;
    foreach($questions as $index => $question){
        if(empty($_POST['q'.$index])){
            $flag = true;
            break;
        }
    }
    if($flag){
        $errors['question'] = "<div class='text-center fs-5 alert alert-danger p-2' role='alert'>" . ucwords("The answers of these questions are required") ."</div>";
    }
    if(empty($errors)){
        $_SESSION['review'] = 0;
        foreach($questions as $index => $question){

        $_SESSION['q'.$index] = $_POST['q'.$index];
        $_SESSION['review'] += $_POST['q'.$index] == 'zero'? 0 : $_POST['q'.$index]; 
        }
        header("location:Result.php");
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
  <div class="container my-5">
    <h1 class="text-center color fw-bolder my-3">
        Your Review
    </h1>
        <?= $errors['question'] ?? "" ?>
        <div class="form-group row bg-color text-light pt-2 align-items-center font-weight-bolder rounded h5">
            <div class="col-4 text-center">
                <label for="name">Questions?</label>
            </div>
            <div class="col-2">
                <p>Bad</p>
            </div>
            <div class="col-2">
                <p>Good</p>
            </div>
            <div class="col-2">
                <p>Very Good</p>
            </div>
            <div class="col-2">
                <p>excellent</p>
            </div>
        </div>
        <form action="" method="POST">
            <?php
                foreach($questions as $index =>  $question){?>
            <div class="form-group row p-2 border-bottom">
                <div class="col-4">
                    <label for=""><?= $question ?></label>
                </div>
                <?php for($i=0; $i<4;$i++){?>
                    
                <div class="col-2">
                    <input type="radio" name="<?= "q{$index}" ?>" value="<?= $i == 0 ? 'zero' : $num[$i] ?>">
                </div>
                <?php }?>

            </div>
            <?php }
            ?>
            <div class="form-group text-center">

                <input type="submit" class="btn btn-primary bg-color my-3 btn-lg" value="Submit">
            </div>
        </form>
    </div>



  <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>