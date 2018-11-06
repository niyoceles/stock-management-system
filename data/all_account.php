<?php
require_once('../class/Account.php');
$users = $user->all_users();
?>
<br />
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Account List </h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="myTable-account" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Role Type</th>
                        <!-- <th><center>password</center></th> -->
                        <th><center>names</center></th>
                        <th><center>Phone</center></th>
                        <th>
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $it): ?>
                    <tr align="center">
                        <td align="left"><?= ucwords($it['user_account']); ?></td>
                        <td align="left"><?php if($it['user_type']==1) {
                            echo'Administrator';
                        }elseif ($it['user_type']==2) {
                            echo "Stock User";
                        }else{
                            echo "Error!";
                        }; ?></td>
                        <!-- <td><? //= $it['user_pass']; ?></td> -->
                        <td><?= $it['names']; ?></td>
                        <td><?= $it['phone']; ?></td>
                        <td>
                            <center>
                            <button onclick="editModalAccount('<?= $it['user_id']; ?>');" type="button" class="btn btn-warning btn-xs">Edit
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
$('#myTable-account').DataTable();
});
</script>
<?php
$user->Disconnect();
?>