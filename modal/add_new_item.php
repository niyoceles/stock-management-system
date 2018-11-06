<?php
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM item_type
		ORDER BY item_type_desc ASC";
$types = $db->getRows($sql);
// echo '<pre>';
// 	print_r($types);
// echo '</pre>';
 ?>
   
<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="form-item">
				<input type="hidden" id="item-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Product Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="item-name" placeholder="Enter Generic Name" required="" autofocus="">
				    </div>
				  </div>

				    <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item code:</label>
				    <div class="col-sm-9">
				      <input type="text"  class="form-control" id="code" placeholder="Enter code" autofocus="">
				    </div>
				  </div>

                 <div class="form-group">
				    <label class="control-label col-sm-3" for="">Department:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="depart" placeholder="Enter Department" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Price:</label>
				    <div class="col-sm-9">
				      <input type="number" step="any" class="form-control" id="item-price" placeholder="Enter Price" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Product Description:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="description" placeholder="Enter Description Quality" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Type of Item:</label>
				    <div class="col-sm-9">
				      <select id="item-type" class="btn btn-default">
				      	<?php foreach($types as $t): ?>
				      		<option value="<?= $t['item_type_id']; ?>"><?= ucwords($t['item_type_desc']); ?></option>
				      	<?php endforeach; ?>
				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-item" value="add" class="btn btn-success">Save
				      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>

			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<?php
$db->Disconnect();
 ?>
