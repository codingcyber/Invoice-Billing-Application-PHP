<?php
    include('includes/header.php');
    include('includes/navigation.php');
    require_once('includes/connect.php');
    if(isset($_POST) & !empty($_POST)){
        if(empty($_POST['name'])){ $errors[] = 'Name field is Required'; }
        if(empty($_POST['email'])){ $errors[] = 'E-Mail field is Required'; }
        if(empty($_POST['mobile'])){ $errors[] = 'Mobile field is Required'; }
        // insert into clients database table with PHP PDO
        if(empty($errors)){
            $sql = "INSERT INTO clients (name, email, mobile, address) VALUES (:name, :email, :mobile, :address)";
            $result = $db->prepare($sql);
            $values = array(
                            ':name'     => $_POST['name'],
                            ':email'    => $_POST['email'],
                            ':mobile'   => $_POST['mobile'],
                            ':address'  => $_POST['address']

                            );
            $res = $result->execute($values);
            if($res){
                echo "redirect the user to create invoice page";
            }
        }
    }
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
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Client Name">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" name="mobile" placeholder="Enter Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter Client Address"></textarea>
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