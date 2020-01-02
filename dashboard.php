<?php
    include('includes/header.php');
    include('includes/navigation.php');
    $today = date("Y-m-d");
    require_once('includes/connect.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <?php
                            // get the number of new customers based on todays date
                            $clientsql = "SELECT * FROM clients WHERE DATE(created)=?";
                            $clientresult = $db->prepare($clientsql);
                            $clientresult->execute(array($today));
                            $todayclients = $clientresult->rowCount();
                        ?>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $todayclients; ?></div>
                            <div>New Customers Today!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Customers</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-5x"></i>
                        </div>
                        <?php
                            $todayrevenue = 0;
                            // get the number of new invoices based on todays date
                            $invoicesql = "SELECT * FROM invoices WHERE DATE(created)=?";
                            $invoiceresult = $db->prepare($invoicesql);
                            $invoiceresult->execute(array($today));
                            $todayinvoices = $invoiceresult->rowCount();
                            // for calculating revenue
                            $invoiceres = $invoiceresult->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($invoiceres as $invoicer) {
                                $todayrevenue += $invoicer['amount'];
                            }
                        ?>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $todayinvoices; ?></div>
                            <div>Today Invoices!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Invoices</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-inr fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $todayrevenue; ?>/-</div>
                            <div>Todays Revenue!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">&nbsp;</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Days', 'Customers', 'Revenue'],
                  ['Mon',  10,      400],
                  ['Tue',  8,      460],
                  ['Wed',  6,       1120],
                  ['Thu',  12,      540],
                  ['Fri',  12,      540],
                  ['Sat',  12,      540],
                  ['Sun',  12,      540]
                ]);

                var options = {
                  title: '7 Days Performanc',
                  hAxis: {title: 'Days',  titleTextStyle: {color: '#333'}},
                  vAxis: {minValue: 0}
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
              }
            </script>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Last 7 Days Revenue
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="chart_div" style="width: 100%; height: 300px;"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> 30 Days Revenue
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>No. Of Invoices</th>
                                            <th>Amount</th>
                                            <th>----</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // for loop to loop through 30 days
                                        for ($i=1; $i < 30; $i++) { 
                                            $day = date("Y-m-d", strtotime("-$i days"));
                                            $revenue = 0;
                                            // get the number of new invoices based on todays date
                                            $inv30sql = "SELECT * FROM invoices WHERE DATE(created)=?";
                                            $inv30result = $db->prepare($inv30sql);
                                            $inv30result->execute(array($day));
                                            $invoicecount = $inv30result->rowCount();
                                            // for calculating revenue
                                            $inv30res = $inv30result->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($inv30res as $inv30r) {
                                                $revenue += $inv30r['amount'];
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $day; ?></td>
                                            <td><?php echo $invoicecount; ?></td>
                                            <td><?php echo $revenue; ?>/-</td>
                                            <td>----</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            
        </div>
        <!-- /.col-lg-8 -->
        
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php include('includes/footer.php'); ?>