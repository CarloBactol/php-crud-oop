<?php
// instanciate registerConfig
require_once('register.config.php');
$data = new registerConfig();
$all = $data->fetchData();
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
    <h1>All data</h1>
    <div class="container">
        <div class="row my-5 mx-5">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all as $key => $val) {
                        ?>
                            <tr>
                                <td><?php echo $val['name'] ?></td>
                                <td><?php echo $val['email'] ?></td>
                                <td>
                                    <a href="edit.php?uid=<?php echo $val['uid'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="delete.php?uid=<?php echo $val['uid'] ?>&req=delete" class="btn btn-sm btn-danger">Delete</a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>