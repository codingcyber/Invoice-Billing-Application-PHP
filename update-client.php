<?php
session_start();
require_once('includes/connect.php');
if(isset($_POST) & !empty($_POST)){
    // validations for email/mobile field unique
    if(empty($_POST['name'])){ $errors[] = 'Name field is Required'; }
    if(empty($_POST['email'])){ $errors[] = 'E-Mail field is Required'; }else{
        $sql = "SELECT * FROM clients WHERE email=? AND id != {$_GET['id']}";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['email']));
        $count = $result->rowCount();
        if($count == 1){
            $errors[] = 'E-Mail already eixts in Database';
        }
    }
    if(empty($_POST['mobile'])){ $errors[] = 'Mobile field is Required'; }else{
        $sql = "SELECT * FROM clients WHERE mobile=? AND id != {$_GET['id']}";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['mobile']));
        $count = $result->rowCount();
        if($count == 1){
            $errors[] = 'Mobile already eixts in Database';
        }
    }

    // CSRF Token Validation
    if(isset($_POST['csrf_token'])){
        if($_POST['csrf_token'] === $_SESSION['csrf_token']){
        }else{
            $errors[] = "Problem with CSRF Token Verification";
        }
    }else{
        $errors[] = "Problem with CSRF Token Validation";
    }

    // CSRF Token Time Validation
    $max_time = 60*60*24;
    if(isset($_SESSION['csrf_token_time'])){
        $token_time = $_SESSION['csrf_token_time'];
        if(($token_time + $max_time) >= time()){
        }else{
            $errors[] = "CSRF Token Expired";
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
        }
    }else{
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_token_time']);
    }

    // insert into clients database table with PHP PDO
    if(empty($errors)){
        $sql = "UPDATE clients SET name=:name, email=:email, mobile=:mobile, address=:address, updated=NOW() WHERE id=:id";
        $result = $db->prepare($sql);
        $values = array(
                        ':name'     => $_POST['name'],
                        ':email'    => $_POST['email'],
                        ':mobile'   => $_POST['mobile'],
                        ':address'  => $_POST['address'],
                        ':id'       => $_GET['id']

                        );
        $res = $result->execute($values);
        if($res){
            header("location: view-clients.php");
        }
    }
}else{
    $sql = "SELECT * FROM clients WHERE id=?";
    $result = $db->prepare($sql);
    $result->execute(array($_GET['id']));
    $res = $result->fetch(PDO::FETCH_ASSOC);
}
// create a CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
include('includes/header.php');
include('includes/navigation.php');
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Client</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
        if(!empty($errors)){
            echo "<div class='alert alert-danger'>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            echo "</div>";
        }
    ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a New Client Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post">
                                <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Client Name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; }else{ echo $res['name']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }else{ echo $res['email']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" name="mobile" placeholder="Enter Mobile Number" value="<?php if(isset($_POST['mobile'])){ echo $_POST['mobile']; }else{ echo $res['mobile']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter Client Address"><?php if(isset($_POST['address'])){ echo $_POST['address']; }else{ echo $res['address']; } ?></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn btn-danger">Reset </button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->   
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include('includes/footer.php'); ?>