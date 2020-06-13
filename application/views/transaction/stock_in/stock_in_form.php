<section class="content-header">
	<h1>
		Stock In
		<small>Barang Masuk Pembelian</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Transaction</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> Stock In</h3>
			<div class="pull-right">
				<a href="<?= site_url('stock/in')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
			</div>

		</div> 
		<div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('stock/process')?>" method="post">
                        <div class="form-group">
                            <label for="">Date *</label>
                            <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
						</div>
						<div>
							<label for="barcode">Barcode *</label>
						</div>
						<div class="form-group input-group">
							<input type="hidden" name="item_id" id="item_id">
							<input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item" >
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
						<div class="form-group">
                            <label for="">Item Name *</label>
                            <input type="text" name="item_name" id="item_name" class="form-control" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="unit_item">Item Unit</label>
									<input type="text" name="unit_item" id="unit_item" value="-" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="stock">Initial Stock</label>
									<input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
                            <label for="detail_stock">Detail Stock *</label>
                            <input type="text" name="detail_stock" id="detail_stock" class="form-control" placeholder="kek apaya">
						</div>
						<div class="form-group">
							<label for="supplier_id">Supplier</label>
							<select name="supplier_id" id="supplier_id" class="form-control">
								<option value="">- Pilih -</option>
								<?php foreach ($supplier as $supply => $data) {
									echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group">
                            <label for="qty">Qty *</label>
                            <input type="number" name="qty" id="qty" class="form-control" required>
						</div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-flat" name="in_add" type="submit"><i class="fa fa-paper-plane"></i> Save</button>    
                            <button class="btn btn-secondary btn-flat" type="reset">Reset</button>    
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-little">
					Select Product Item
				</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table1">
					<thead>
						<tr>
							<td>Barcode</td>
							<td>Name</td>
							<td>Unit</td>
							<td>Price</td>
							<td>Stock</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($item as $items => $data) {
						?>
						<tr>
							<td><?=$data->barcode?></td>
							<td><?=$data->name?></td>
							<td><?=$data->nama_unit?></td>
							<td class="text-right"><?=$data->harga?></td>
							<td class="text-right"><?=$data->stok?></td>
							<td class="text-right">
								<button class="btn btn-xs btn-info" id="select" data-id="<?= $data->item_id?>" data-barcode="<?= $data->barcode?>" data-name="<?= $data->name?>" data-unit="<?= $data->nama_unit?>" data-stok="<?= $data->stok?>">
									<i class="fa fa-check"></i> Select
								</button>
							</td>
						</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(document).on('click', '#select', function(){
			var item_id = $(this).data('id');
			var barcode = $(this).data('barcode');
			var name = $(this).data('name');
			var nama_unit = $(this).data('unit');
			var stok = $(this).data('stok');
			$('#item_id').val(item_id);
			$('#barcode').val(barcode);
			$('#item_name').val(name);
			$('#unit_item').val(nama_unit);
			$('#stock').val(stok);
			$('#modal-item').modal('hide');
		})
	})
</script>