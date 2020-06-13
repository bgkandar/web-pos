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
    <?php $this->view('message'); ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Stock In</h3>
			<div class="pull-right">
				<a href="<?= site_url('stock/in/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Create</a>
			</div>

		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>#</th>
						<th>Barcode</th>
						<th>Supplier Name</th>
						<th>Product Item</th>
						<th>Qty</th>
						<th>Date</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; 
					foreach($row as $key => $data) { ?>
					<tr>
						<td style="width:5%;"><?= $no++?>.</td>
						<td><?= $data->barcode?></td>
						<td><?= $data->supplier_name == '' ? 'Tidak ada penyuplai' : $data->supplier_name?></td>
						<td><?= $data->item_name?></td>
						<td><?= $data->qty?></td>
						<td><?= indo_tanggal($data->date)?></td>
						<td class="text-center" width="160px">
							<a class="btn btn-warning btn-xs btn-flat" id="detailStock" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $data->barcode?>" data-item_name="<?= $data->item_name?>" data-detail="<?= $data->detail?>" data-supplier_name="<?= $data->supplier_name?>" data-qty="<?= $data->qty?>" data-date="<?= $data->date?>"><i class="fa fa-eye"></i> Detail</a>		
							<a href="<?= site_url('stock/in/delete/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>		
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-little">
					Stock In Detail
				</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin" >
					<tbody>
						<tr>
							<th>Barcode</th>
							<td><span id="barcode"></span></td>
						</tr>
						<tr>
							<th>Item Name</th>
							<td><span id="item_name"></span></td>
						</tr>
						<tr>
							<th>Detail</th>
							<td><span id="detail"></span></td>
						</tr>
						<tr>
							<th>Nama Supplier</th>
							<td><span id="supplier_name"></span></td>
						</tr>
						<tr>
							<th>Qty</th>
							<td><span id="qty"></span></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><span id="date"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(document).on('click', '#detailStock', function(){
			var barcode = $(this).data('barcode');
			var item_name = $(this).data('item_name');
			var detail = $(this).data('detail');
			var supplier_name = $(this).data('supplier_name');
			var qty = $(this).data('qty');
			var date = $(this).data('date');
			$('#barcode').text(barcode);
			$('#item_name').text(item_name);
			$('#detail').text(detail);
			$('#supplier_name').text(supplier_name);
			$('#qty').text(qty);
			$('#date').text(date);
			$('#modal-item').modal('hide');
		})
	})
</script>
