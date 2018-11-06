<?php
require_once('../class/Losts.php');
$date = $_GET['date'];
$dailySales = $sales->daily_sales($date);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
        <!-- Font Awesome -->
        <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript">
        print();
        </script>
    </head>
    <body>
        
        <center>
        <h1>RTC Rubavu Technical College</h1>
        <h1>LOST ITEMS LISTS</h1>
        <!-- <h2>of</h2> -->
        <h3><?php // $date; ?></h3>
        </center>
        <br />
        <div class="table-responsive">
            <table id="myTable-sales" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th><center>Date time</center></th>
                        <th><center>Product Description</center></th>
                        <th><center>Type</center></th>
                        <th><center>Price</center></th>
                        <th><center>Qty</center></th>
                        <th><center>Sub Total</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $qtytotal =0;
                    foreach($dailySales as $ds):
                    $subTotal = $ds['price'] * $ds['qty'];
                    $total += $subTotal;
                    $qtytotal += $ds['qty'];
                    ?>
                    <tr>
                        <td><?= $ds['generic_name']; ?></td>
                        <td><?= $ds['date_sold']; ?></td>
                        <td><?= $ds['gram']; ?></td>
                        <td><?= $ds['type']; ?></td>
                        <td align="center"><?= number_format($ds['price'], 0); ?></td>
                        <td align="center"><?= $ds['qty']; ?></td>
                        <td align="center"><?= $subTotal; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <!-- <td></td> -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><strong>TOTAL:</strong></td>
                    <td align="center">
                        <strong><?= number_format($qtytotal, 0); ?></strong>
                    </td>
                    <td align="center">
                        <strong><?= number_format($total, 0); ?></strong>
                    </td>
                </tr>
            </table>
        </div>
        <br />
        <script type="text/javascript">
        $(document).ready(function() {
        $('#myTable-sales').DataTable();
        });
        </script>
        <?php
        $sales->Disconnect();
        ?>