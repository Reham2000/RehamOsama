<?php
$cities =['cairo','Giza','Alex','Faiyum','Mansoura'];
if(! isset($final_total)){
    $final_total = 0;
}
if($_POST){
    $errors = [];
function discount($final_total)
{
        if($final_total < 1000 ){
            $dis = 0;
        }elseif($final_total < 3000){
            $dis = 0.1;
        }elseif($final_total < 4500){
            $dis = 0.15;
        }elseif($final_total >= 4500){
            $dis = 0.2;
        }
        return $dis;
}
function delivery($city)
{
        if($city == "cairo" ){
            $delivery = 0;
        }elseif($city == "Giza"){
            $delivery = 30;
        }elseif($city == "Alex"){
            $delivery = 50;
        }else{
            $delivery = 100;
        }
        return $delivery;
}
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_POST['name'])){
            $errors['name'] = "<div class='alert alert-danger p-1' role='alert'>The Name Is Required !</div>";
        }
        if(empty($_POST['city'])){
            $errors['city'] = "<div class='alert alert-danger p-1' role='alert'>The City Is Required !</div>";
        }
        if(empty($_POST['product_num'])){
            $errors['product_num'] = "<div class='alert alert-danger p-1' role='alert'>The Number Of Products Is Required !</div>";
        }

        if(empty($errors)){
            if(isset($_POST['to']) && $_POST['to'] == "products"){
                $flag = false;
                for($i=1; $i <= $_POST['product_num'];$i++ ){
                    if(empty($_POST['pro'.$i]) && empty($_POST['amount'.$i]) && empty($_POST['price'.$i])){
                        $flag = true;
                    }
                }
                if($flag){
                    $errors['products'] = "<div class='alert alert-danger p-1' role='alert'>The Data Of Products Are Required !</div>";
                }else{

                    $_POST['then'] = 'Reicep';
                    if($_POST['then'] = 'Reicep'){

                    }
                }

            }
        }
    }
}





?>
<!doctype html>
<html lang="en">

<head>
    <title>Super market </title>
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

    <div class="container ">
        <h1 class="text-center text-primary fw-bolder my-5">Super market </h1>

        <div class="row">
            <div class="col-8 offset-2 px-5 py-2 mh-100 color">
                <form method="POST" action="" class="fw-bolder w-100 color">
                    <div class="form-group text-left py-3">
                        <label for="name">Client Name : </label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>
                    <?= isset($errors['name']) ? $errors['name'] : '' ?>
                    <div class="form-group text-left py-3">
                        <label for="city">Client City : </label>
                        <select class="form-control" name="city" id="city">
                            <?php
                            foreach($cities as $city){?>
                            <option <?php
                            if($_POST['city'] == $city){
                                echo 'selected';
                            }
                            ?> value="<?= $city ?>"><?= $city ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?= isset($errors['city']) ? $errors['city'] : '' ?>
                    <div class="form-group text-left py-3">
                        <label for="product_num"> Number of Products : </label>
                        <input type="number" class="form-control" id="product_num" name="product_num"
                            value="<?= isset($_POST['product_num']) ? $_POST['product_num'] : '' ?>">
                    </div>
                    <?= isset($errors['product_num']) ? $errors['product_num'] : '' ?>
                    <input type="text" name="to" value="products" class="d-none">
                    <div class="form-group text-center py-3">
                        <button type="submit" class="px-5 btn btn-block btn-lg bg-primary text-white ">Submit</button>
                    </div>
                    <?php if(isset($_POST['to']) && $_POST['to'] == 'products'){ 
                    echo $errors['products'] ?? "";    
                    ?>
                    <table class="table table-striped table-inverse table-responsive color">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i=1; $i<= $_POST['product_num'];$i++){ ?>
                            <tr>
                                <td><?= $i?></td>
                                <td><input class="form-control" type="text" name="pro<?= $i ?>"
                                        value="<?= $_POST['pro'.$i] ?? "" ?>"></td>
                                <td><input class="form-control" type="number" name="amount<?= $i ?>"
                                        value="<?= $_POST['amount'.$i] ?? "" ?>"></td>
                                <td><input class="form-control" type="number" name="price<?= $i ?>"
                                        value="<?= $_POST['price'.$i] ?? '' ?>"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- <input type="text" name="then" value="Reicep" class="d-none"> -->
                    <div class="form-group text-center py-3">
                        <button type="submit" class="px-5 btn btn-block btn-lg bg-primary text-white ">Get
                            Reicep</button>
                    </div>
                    <?php } ?>
                    <?php if(isset($_POST['then']) && $_POST['then'] == 'Reicep'){ ?>
                    <table class="table table-striped table-inverse table-responsive color my-3">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantities</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i=1;$i<= $_POST['product_num'];$i++){?>
                            <tr>
                                <td><?= $_POST['pro'.$i]  ?></td>
                                <td><?= $_POST['price'.$i] ." EGP"?></td>
                                <td><?= $_POST['amount'.$i] ?></td>
                                <td><?= $_POST['price'.$i] * $_POST['amount'.$i] ." EGP"?></td>
                                <?php $final_total += $_POST['price'.$i] * $_POST['amount'.$i]   ?>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>

                    <?php } ?>

                </form>
                <?php if(isset($_POST['then']) && $_POST['then'] == 'Reicep'){ ?>

                <h3 class="h1 text-center color">Reicep</h3>
                <table class="table table-striped table-inverse table-responsive fs-5 fw-bold color">
                    <tbody>
                        <tr>
                            <td>Client Name</td>
                            <td><?= $_POST['name'] ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?= ucfirst($_POST['city']) ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?= $final_total ." EGP" ?></td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td><?= discount($final_total) *$final_total ." EGP"?></td>
                        </tr>
                        <tr>
                            <td>Total After Discount</td>
                            <td><?= $final_total - (discount($final_total) *$final_total) ." EGP" ?></td>
                        </tr>
                        <tr>
                            <td>Delivery</td>
                            <td><?= delivery($_POST['city']) ." EGP" ?></td>
                        </tr>
                        <tr class="fs-4 fw-bolder">
                            <td>Total Net.</td>
                            <td><?= $final_total - (discount($final_total) *$final_total) + delivery($_POST['city']) ." EGP"  ?></td>
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