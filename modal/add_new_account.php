   <div class="modal fade" id="modal-account">
	<div class="modal-dialog">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="form-account">
				<input type="hidden" id="user_id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Names:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="names" placeholder="Enter Username" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Phone number:</label>
				    <div class="col-sm-9">
				      <input type="number" min="10" step="any" class="form-control" id="phone" placeholder="Enter Phone" required="">
				    </div>
				  </div>

				    <div class="form-group">
				    <label class="control-label col-sm-3" for="">Username:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="20" class="form-control" id="username" placeholder="Enter Username" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Password:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="20" class="form-control" id="password" placeholder="Enter Password" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Role Type:</label>
				    <div class="col-sm-9">
				      <select id="user_type" class="btn btn-default">
				      	<option value="2">Stock user</option>
				      	<option value="1">Administrator</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-account" value="add" class="btn btn-success">Save
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
