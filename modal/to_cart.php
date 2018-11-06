<div class="modal fade" id="modal-to-cart">
	<div class="modal-dialog">
		<div class="panel panel-info">
			<div class="panel-heading">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Taking Item From Stock</h4>
			</div>
			<div class="panel-body">
			<!--  -->
				<form class="form-horizontal" role="form" id="form-toCart">
				<input type="hidden" id="item-id">
				<input type="hidden" id="stock-id">
				<input type="hidden" id="item-qty">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="">Quantity:</label>
				    <div class="col-sm-10">
				      <input type="number" min="1" class="form-control" id="cart-qty" placeholder="Enter Quantity" required="">
				    </div>
				  </div>

				   <div class="form-group">
				    <label class="control-label col-sm-2" for="">Department:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="department" placeholder="Department" required="">
				    </div>
				  </div>

				   <div class="form-group">
				    <label class="control-label col-sm-2" for="">Taken By :</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="someone" placeholder="Someone" required="">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Withdrow stock
				      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>
			<!--  -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
