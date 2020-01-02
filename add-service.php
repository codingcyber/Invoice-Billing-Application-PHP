<?php
session_start();
require_once('includes/connect.php');
if(isset($_POST) & !empty($_POST)){
    // validations for email/mobile field unique
    if(empty($_POST['name'])){ $errors[] = 'Name field is Required'; }
    if(empty($_POST['price'])){ $errors[] = 'Price field is Required'; }

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
        $sql = "INSERT INTO items (name, description, type, price) VALUES (:name, :description, 'service', :price)";
        $result = $db->prepare($sql);
        $values = array(
                        ':name'             => $_POST['name'],
                        ':description'      => $_POST['description'],
                        ':price'            => $_POST['price']

                        );
        $res = $result->execute($values);
        if($res){
            header("location: view-services.php");
        }
    }
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
            <h1 class="page-header">Add New Service</h1>
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
                    Create a New Service Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post">
                                <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Servive Name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Service Description</label>
                                    <textarea class="form-control" name="description" rows="3"><?php if(isset($_POST['description'])){ echo $_POST['description']; } ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Service Price</label>
                                    <input class="form-control" name="price" placeholder="Enter Service Price" value="<?php if(isset($_POST['price'])){ echo $_POST['price']; } ?>">
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