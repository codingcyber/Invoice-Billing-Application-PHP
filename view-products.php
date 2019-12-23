<?php
    include('includes/header.php');
    include('includes/navigation.php');
    require_once('includes/connect.php');
    $sql = "SELECT * FROM items WHERE type='service'";
    $result = $db->query($sql);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Products
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Price</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $product) { ?>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><a href="update-product.php?id=<?php echo $product['id']; ?>">Edit</a> | <a href="delete-item.php?id=<?php echo $product['id']; ?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include('includes/footer.php'); ?>