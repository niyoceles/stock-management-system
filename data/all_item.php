<?php
require_once('../class/Item.php');
$items = $item->all_items();
    // echo '<pre>';
            //     print_r($items);
// echo '</pre>';
?>
<br />
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Items List </h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-item" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Product Name</th>
                        <th>Type</th>
                        <th>Department</th>
                        <th><center>Product Description</center></th>
                        <th><center>Price</center></th>
                        <th>
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $it): ?>
                    <tr align="center">
                        <td align="left"><?= ucwords($it['code']); ?></td>
                        <td align="left"><?= ucwords($it['item_name']); ?></td>
                        <td align="left"><?= $it['item_type_desc']; ?></td>
                        <td align="left"><?= $it['depart']; ?></td>
                        <td><?= $it['item_description']; ?></td>
                        <td><?= "Frw ".number_format($it['item_price']); ?></td>
                        <td>
                            <center>
                            <button onclick="editModal('<?= $it['item_id']; ?>');" type="button" class="btn btn-warning btn-xs">Edit
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>
                            </center>
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
$('#myTable-item').DataTable();
});
</script>
<?php
$item->Disconnect();
?>