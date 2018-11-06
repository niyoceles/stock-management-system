<?php
require_once('../class/Expired.php');
$expireds = $expired->all_expired();
?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Expired Item List </h3>
       
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-expired" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th><center>Item Name</center></th>
                        <th><center>Price</center></th>
                        <th><center>Qty</center></th>
                        <th><center>Expired Date</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($expireds as $ex): ?>
                    <tr align="center" class="text-danger">
                        <td><?= ucwords($ex['exp_itemName']); ?></td>
                        <td><?= "Frw ".number_format($ex['exp_itemPrice']); ?></td>
                        <td><?= $ex['exp_itemQty']; ?></td>
                        <td><?= $ex['exp_expiredDate']; ?></td>
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
$('#myTable-expired').DataTable();
});
</script>
<?php
$expired->Disconnect();
?>