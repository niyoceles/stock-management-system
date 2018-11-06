<?php
require_once('../class/Stock.php');
$stockList = $stock->all_stockList();
// echo '<pre>';
    //     print_r($stockList);
// echo '</pre>';
?>
<br />
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Item Detailed | Current Stock</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-stocklist" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th><center></center></th>
                        <th>Property Name</th>
                        <th><center>Qty</center></th>
                        <th>Type</th>
                        <th><center>Manufactured Date</center></th>
                        <th><center>Purchased Date </center></th>
                        <th><center>Price</center></th>
                        
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dateNow = date('Y-m');
                    foreach($stockList as $sl):
                    $xDate = strtotime($sl['stock_expiry']);
                    $xDate = date('Y-m', $xDate);
                    $class = "text-success";
                    if($xDate == $dateNow){
                    $class = "text-warning";
                    }
                    ?>
                    <tr  align="center" class="<?= $class; ?>">
                        <td><input type="checkbox" name="stock" value="<?= $sl['stock_id']; ?>"></td>
                        <td align="left"><?= ucwords($sl['item_name']); ?></td>
                        <td><?= $sl['stock_qty']; ?></td>
                        <td align="left"><?= $sl['item_type_desc']; ?></td>
                        <td><?= $sl['stock_manufactured']; ?></td>
                        <td><?= $sl['stock_purchased']; ?></td>
                        <td><?= "Frw ".number_format($sl['item_price']); ?></td>
                        
                        <td align="left" width="110px;"><?= $sl['stock_expiry']; ?>
                            <?php if($xDate <= $dateNow): ?>
                            <span class="label label-danger">!</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br />
<script type="text/javascript">
$(document).ready(function() {
$('#myTable-stocklist').DataTable();
});
</script>
<?php
$stock->Disconnect();
?>