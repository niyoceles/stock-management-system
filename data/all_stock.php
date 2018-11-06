<?php
require_once('../class/Stock.php');
$stocks = $stock->all_stockGroup();
    // echo '<pre>';
        //     print_r($stocks);
// echo '</pre>';
?>
<br />
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        All Current stock</h3>
        
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-stock" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th><center>Item Name</center></th>
                        <th><center>Price</center></th>
                        <th><center>Qty</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stocks as $s): ?>
                    <tr align="center">
                        <td><?= ucwords($s['item_name']); ?></td>
                        <td><?= "Frw ".number_format($s['item_price']); ?></td>
                        <td><?= $s['qty']; ?></td>
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
$('#myTable-stock').DataTable();
});
</script>
<?php
$stock->Disconnect();
?>