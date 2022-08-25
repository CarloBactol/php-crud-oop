<?php
require_once('register.config.php');
$data = new registerConfig();
$uid = $_GET['uid'];
$data->setUid($uid);

if (isset($_POST['btnUpdate'])) {
    $data->setName($_POST['name']);
    $data->setEmail($_POST['email']);
    $data->setPassword(md5($_POST['password']));

    $data->update();
    echo "<script>alert('data successfully update'); document.location='allData.php'</script>";
}
// fetch  one data
$record = $data->fecthOneData();
//get the index of the record
$value = $record[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="conatiner my-5 mx-5">
        <div class="row">
            <div class="col-md-10">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?php echo $value['name']; ?>" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="<?php echo $value['email']; ?>" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="<?php echo $value['password']; ?>" name="password" class="form-control">
                    </div>
                    <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>