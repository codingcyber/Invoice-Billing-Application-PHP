<?php
session_start();
    include('includes/header.php');
    include('includes/navigation.php');
    require_once('includes/connect.php');
?>
<style type="text/css">
ul#results{
    list-style: none;
    width: 100%;
    margin: 0;
    padding: 0;
    display: none;
}

ul#results li a{
    color: #000;
    background: #ccc;
    display: block;
    text-decoration: none;
}
ul#results li a:hover{
    background: #aaa;
}
</style>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create New Invoice</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
        if(isset($_GET['id']) & !empty($_GET['id'])){
            echo "<input type='hidden' id='cid' name='cid' value='{$_GET['id']}'";
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a New Invoice Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <form role="form"> -->
                                <div class="form-group">
                                    <label>Search Product/Service</label>
                                    <input id="search" class="form-control" placeholder="Product Name">
                                </div>
                                <ul id="results">

                                </ul>
                            <!-- </form> -->
                        </div>
                        <!-- /.col-lg-6 (nested) -->   
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <?php if(isset($_SESSION['invoice'])){ print_r($_SESSION['invoice']); ?>
        <div class="panel panel-default">
          <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table invoice-items">
                        <thead>
                        <tr class="h4 text-dark">
                            <th id="cell-id" class="text-semibold">ID</th>
                            <th id="cell-item" class="text-semibold">ITEM</th>
                            <th id="cell-qty" class="text-center text-semibold">QUANTITY</th>
                            <th id="cell-price" class="text-center text-semibold">UNIT COST</th>
                            <th id="cell-total" class="text-center text-semibold">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                                foreach ($_SESSION['invoice'] as $key => $item) {
                                    $sql = "SELECT id, name, price FROM items WHERE id=?";
                                    $result = $db->prepare($sql);
                                    $result->execute(array($item['item_id']));
                                    $res = $result->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <td><a href="remove-item.php?sid=<?php echo $key; ?>&id=<?php echo $res['id']; ?>">x</a> <?php echo $res['id']; ?></td>
                                <td><?php echo $res['name']; ?></td>

                                <td class="text-center">
                                    <form method="post" action="update-quantity.php">
                                        <input type="number" name="quantity" value="21">
                                        <input type="hidden" name="itemid" value="21">
                                        <input type="submit" value="Update"> 
                                    </form>
                                </td>
                                <td class="text-center amount"><?php echo $res['price']; ?>/-</td>

                                </form>
                                <td class="text-center amount">INR <?php echo $res['price']*$item['quantity']; ?>/-</td>
                            </tr>
                            <?php 
                                $total += $res['price'] * $item['quantity'];
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Grand Total</label>
                                <h3 class="amount">INR <?php echo $total; ?>/-</h3> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <input class="form-control" name="name" placeholder="Payment Mode">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Reference</label>
                                <input class="form-control" name="name" placeholder="Payment Reference">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <input type="submit" value="Create Invoice" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php } else{ echo "<h2>First add the client by searching</h2>"; } ?>
<script type="text/javascript">
    var results = document.getElementById('results');
    var search = document.getElementById('search');
    var customerId = document.getElementById('cid');

    function getItemResults(){
        var searchVal = search.value;
        var customerIdVal = customerId.value;

        if(searchVal.length < 1){
            results.style.display='none';
            return;
        }

        console.log('searchVal : ' + searchVal);
        var xhr = new XMLHttpRequest();
        var url = 'searchitems.php?search=' + searchVal+'&cid='+customerIdVal;
        // open function
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var text = xhr.responseText;
                //console.log('response from searchresults.php : ' + xhr.responseText);
                results.innerHTML = text;
                results.style.display='block';
            }
        }

        xhr.send();
    }

    search.addEventListener("input", getItemResults);
</script>
<?php include('includes/footer.php'); ?>