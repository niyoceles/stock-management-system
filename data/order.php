<?php
require_once('../class/Stock.php');
require_once('../class/Cart.php');
$stocks = $stock->all_stockList();
$cartDatas = $cart->all_cartDatas($_SESSION['logged_id']);
    // echo '<pre>';
        //     print_r($cartDatas);
// echo '</pre>';
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Detailed Current Stock</h3>
            </div>
            <div class="panel-body">
                <!-- start item -->
                <div class="table-responsive">
                    <table id="myTable-item-order" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th><center>Property name</center></th>
                                <th><center>Qty</center></th>
                                <th><center>Price</center></th>
                                
                                <th><center></center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($stocks as $s): ?>
                            <tr align="center">
                                <td><?= ucwords($s['item_name']); ?></td>
                                <td><?= $s['stock_qty']; ?></td>
                                <td><?= "Frw ".number_format($s['item_price'], 0); ?></td>
                                
                                <td>
                                    <button onclick="toCart('<?= $s['stock_id']; ?>','<?= $s['stock_qty']; ?>','<?= $s['item_id']; ?>');" type="button" class="btn btn-success btn-xs"> Take
                                    <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                $('#myTable-item-order').DataTable();
                });
                </script>
                <!-- end item -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                Withdrow Item from Stock
                </h3>
            </div>
            <div class="panel-body">
                <!-- cart -->
                <div class="table-responsive">
                    <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th><center></center></th>
                                <th><center>Property name</center></th>
                                <th><center>Dept</center></th>
                                <th><center>By</center></th>
                                <th><center>Price</center></th>
                                <th><center>Qty</center></th>
                                <!-- <th><center>Sub</center></th> -->
                                <th><center></center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $qtytotal = 0;
                            foreach($cartDatas as $c):
                            $price = $c['item_price'];
                            $qty = $c['cart_qty'];
                            // $subTotal = $price * $qty;
                            $subTotal = $price * $qty;
                            $total += $subTotal;
                            $qtytotal += $qty;
                            ?>
                            <tr align="center">
                               <td><input type="checkbox" name="losted" value="<?= $c['cart_id']; ?>"></td>
                                <td><?= ucwords($c['item_name']); ?></td>
                                <td><?= ucwords($c['department']); ?></td>
                                <td><?= ucwords($c['someone']); ?></td>
                                <td><?= "Frw ".number_format($c['item_price'], 2); ?></td>
                                <td><?= $c['cart_qty']; ?></td>
                                <!-- <td><?php// number_format($subTotal,0); ?></td> -->
                               <td>
                                    <button onclick="delCart('<?= $c['cart_stock_id']; ?>','<?= $qty; ?>','<?= $c['cart_id']; ?>');" type="buttson" class="btn btn-info btn-xs"> Return
                                    <span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tr>
                            <!-- <td></td> -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="right"><strong>Total:</strong></td>

                            <td align="center">
                                <strong><?= number_format($qtytotal); ?></strong>
                            </td>
                            <!-- <td align="center">
                                <strong><?php// number_format($total, 0); ?></strong>
                            </td> -->
                             <td>
                                <?php if($total > 0): ?>
                               <!--  <button onclick="confirm_cart()" type="button" class="btn btn-danger btn-xs">
                                Losted Items
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button> -->
                        
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                $('#myTable-cart').DataTable();
                });
                </script>
                <!-- cart -->
            </div>
        </div>
    </div>
</div>
<br />