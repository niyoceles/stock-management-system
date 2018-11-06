<?php
require_once('../class/Type.php');
$typeList = $type->all_typeList();
?>
<br />
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Item Detailed | Current type</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-typelist" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th><center></center></th>
                        <th>ID</th>
                        <th>Item Type Name</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($typeList as $sl):
              
                    ?>
                    <tr  align="center" class="<?= $class; ?>">
                        <td><input type="checkbox" name="type" value="<?= $sl['item_type_id']; ?>"></td>
                        <td align="left"><?= ucwords($sl['item_type_id']); ?></td>
                        <td align="left"><?= $sl['item_type_desc']; ?></td>
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
$('#myTable-typelist').DataTable();
});
</script>
<?php
$type->Disconnect();
?>