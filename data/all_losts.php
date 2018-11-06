<?php
require_once('../class/Losts.php');
$date = $_GET['date'];
$dailySales = $sales->daily_sales($date);
?>
<br />
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Losted Items</h3>
        
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-sales" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Property name</th>
                        <th><center>Product description</center></th>
                        <th><center>Date time</center></th>
                        <th><center>Type</center></th>
                        <th><center>Price</center></th>
                        <th><center>Qty</center></th>
                        <th><center>Sub Total</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $qtytotal = 0;
                    foreach($dailySales as $ds):
                    $subTotal = $ds['price'] * $ds['qty'];
                    $total += $subTotal;
                    $qtytotal += $ds['qty'];
                    ?>
                    <tr>
                        <td><?= $ds['generic_name']; ?></td>
                        <td><?= $ds['gram']; ?></td>
                         <td><?= $ds['date_sold']; ?></td>
                        <td><?= $ds['type']; ?></td>
                        <td align="center"><?= number_format($ds['price']); ?></td>
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
                        <strong><?= number_format($qtytotal,0); ?></strong>
                    </td>
                    <td align="center">
                        <strong><?= number_format($total,0); ?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
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