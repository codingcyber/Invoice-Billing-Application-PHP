<?php
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
                            <p class="font-weight-bold mb-1">Invoice #550</p>
                            <p class="text-muted">Due to: 4 Dec, 2019</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1">John Doe, Mrs Emma Downson</p>
                            <p>Acme Inc</p>
                            <p class="mb-1">Berlin, Germany</p>
                            <p class="mb-1">6781 45P</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">Payment Mode: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">Payment Reference: </span> 10253642</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Software</td>
                                        <td>LTS Versions</td>
                                        <td>21</td>
                                        <td>INR 321/-</td>
                                        <td>INR 3452/-</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Software</td>
                                        <td>Support</td>
                                        <td>234</td>
                                        <td>INR 6356/-</td>
                                        <td>INR 23423/-</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Software</td>
                                        <td>Sofware Collection</td>
                                        <td>4534</td>
                                        <td>INR 354/-</td>
                                        <td>INR 23434/-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">INR 234,234/-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    
<?php include('includes/footer.php'); ?>