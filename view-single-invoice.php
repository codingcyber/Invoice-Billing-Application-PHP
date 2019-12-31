<?php
require_once('includes/connect.php');
// fetch the invoice details from invoices table
$invsql = "SELECT * FROM invoices WHERE id=?";
$invresult = $db->prepare($invsql);
$invresult->execute(array($_GET['id']));
$invres = $invresult->fetch(PDO::FETCH_ASSOC);
// get the client information based on the client id
// get the item details based on the invoices id from invoice_items table
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #<?php echo $invres['id']; ?></p>
                            <p class="text-muted">Due to: <?php echo $invres['created']; ?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <?php
                                $clientsql = "SELECT * FROM clients WHERE id=?";
                                $clientresult = $db->prepare($clientsql);
                                $clientresult->execute(array($invres['client_id']));
                                $clientres = $clientresult->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1"><?php echo $clientres['name']; ?></p>
                            <p><?php echo $clientres['mobile']; ?></p>
                            <p class="mb-1"><?php echo $clientres['email']; ?></p>
                            <p class="mb-1"><?php echo $clientres['address']; ?></p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">Payment Mode: </span> <?php echo $invres['payment_mode']; ?></p>
                            <p class="mb-1"><span class="text-muted">Payment Reference: </span> <?php echo $invres['payment_ref']; ?></p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $invitmsql = "SELECT * FROM invoice_items WHERE invoice_id=?";
                                        $invitmresult = $db->prepare($invitmsql);
                                        $invitmresult->execute(array($invres['id']));
                                        $invitmres = $invitmresult->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($invitmres as $invitm) {
                                            // get the item name from items table
                                            $itmsql = "SELECT * FROM items WHERE id=?";
                                            $itmresult = $db->prepare($itmsql);
                                            $itmresult->execute(array($invitm['item_id']));
                                            $itmres = $itmresult->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <tr>
                                        <td><?php echo $invitm['id']; ?></td>
                                        <td><?php echo $itmres['name']; ?></td>
                                        <td><?php echo $invitm['item_quantity']; ?></td>
                                        <td>INR <?php echo $invitm['item_price']; ?>/-</td>
                                        <td>INR <?php echo $invitm['total_price']; ?>/-</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">INR <?php echo $invres['amount']; ?>/-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    
<?php include('includes/footer.php'); ?>