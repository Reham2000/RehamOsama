<?php
session_start();
$questions = ['Are you satisfied with the cleanliness level?','Are you satisfied with the service prices?','Are you satisfied with the nursing service','Are you satisfied with the level of the doctor?','Are you satisfied with the calmness in the hospital?'];
function compare($rate){
    $review = '';
    if($rate == "zero"){
        $review = 'Bad';
    }elseif($rate == 3){
        $review = 'Good';
    }elseif($rate == 5){
        $review = 'Good';
    }elseif($rate == 10){
        $review = 'Good';
    }
    return $review;
}

        $errors= [];
        $erroes['good']="<div class='alert alert-success text-center rounded-pill fs-4 fw-bold' role='alert'>
    Thank you !</div>";
        
    $erroes['bad'] ="<div class='alert  alert-danger text-center rounded-pill' role='alert'>
    we will call you in :".$_SESSION['phone']." 
    </div>";
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
  <div class="container ">
        <div class="row ">
            <div class="col-12 row px-5 font-weight-bolder bg-info text-white align-items-center pt-2">
                <div class="col-8 ">
                    <label for="name">Questions?</label>
                </div>
                <div class="col-4 px-5">
                    <p>Review Result</p>
                </div>
            </div>
            <?php 
                    foreach($questions as $index => $question){ ?>
            <div class="col-8 p-3">
                <p class=" text-weight-bolder "><?= $question ?></p>
            </div>
            <div class="col-4 p-3">
                <p class=" font-weight-bold "> <?= compare($_SESSION['q'.$index]) ?></p>
            </div>
            <?php } ?>
            <div class="col-12 p-3 mb-3 bg-color text-white rounded rounded-pill row px-5">
            <div class="col-8 font-weight-bolder h3">Total</div>
            <div class="col-4 font-weight-bolder h3"><?= $_SESSION['review'] < 25 ? "Bad" : "Good" ?></div>
            </div>
        </div>
        <?= $_SESSION['review'] < 25 ? $erroes['bad'] : $erroes['good'] ?>

        
    </div>




  <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>