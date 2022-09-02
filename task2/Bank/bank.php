<?php
$_POST['to'] = '';
if($_POST){
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name'])){
            $errors['name'] = "<div class='alert alert-danger p-1' role='alert'>The Name Is Required !</div>";
        }
        if(empty($_POST['loan'])){
            $errors['loan'] = "<div class='alert alert-danger p-1' role='alert'>The Loan Is Required !</div>";
        }
        if(empty($_POST['year'])){
            $errors['year'] = "<div class='alert alert-danger p-1' role='alert'>The Number Of Years Are Required !</div>";
        }
        if(empty($errors)){
            if($_POST['year'] <= 3){
                $_POST['interest'] = $_POST['loan'] *(10/100);

            }else{
                $_POST['interest'] = $_POST['loan'] *(15/100);
            }  
            $total =$_POST['loan'] + $_POST['interest'];
            $monthly =round($total /($_POST['year'] * 12),2) ;
            $_POST['to'] = 'data';
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
            <div class="col-6 offset-3 px-5 py-2 border border-3 border-color rounded mh-100">
                <form method="POST" action="" class="fw-bolder w-100 color">
                    <div class="form-group text-left py-3">
                        <label for="name">User Name : </label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>
                    <?= isset($errors['name']) ? $errors['name'] : '' ?>
                    <div class="form-group text-left py-3">
                        <label for="loan">Loan amount : </label>
                        <input type="number" class="form-control" id="loan" name="loan"
                            value="<?= isset($_POST['loan']) ? $_POST['loan'] : '' ?>">
                    </div>
                    <?= isset($errors['loan']) ? $errors['loan'] : '' ?>
                    <div class="form-group text-left py-3">
                        <label for="year">Loan years : </label>
                        <input type="number" class="form-control" id="year" name="year"
                            value="<?= isset($_POST['year']) ? $_POST['year'] : '' ?>">
                    </div>
                    <?= isset($errors['year']) ? $errors['year'] : '' ?>
                    <!-- <input type="text" name="to" value="data" class="d-none"> -->
                    <div class="form-group text-center py-3">
                        <button type="submit" class="btn btn-block btn-lg bg-primary text-white ">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-8 offset-2">
                <?php
                if($_POST['to'] == 'data'){?>

                <table class="my-3 table table-striped table-inverse table-responsive border border-2 rounded">
                    <thead class="thead-inverse color">
                        <tr>
                            <th>User Name</th>
                            <th>Interest Rate</th>
                            <th>Loan afyer Rate</th>
                            <th>Monthly</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td><?= isset($_POST['name']) ? $_POST['name'] : '' ?></td>
                            <td><?= isset($_POST['interest']) ? "{$_POST['interest']} EGP" : '' ?></td>
                            <td><?= isset($total) ? "{$total} EGP" : '' ?></td>
                            <td><?= isset($monthly) ? "{$monthly} EGP" : '' ?></td>
                        </tr>

                    </tbody>
                </table>
                <?php } ?>

            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>