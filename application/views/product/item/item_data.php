<section class="content-header">
	<h1>
		Items
		<small>Data Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Items</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Product Items</h3>
			<div class="pull-right">
				<a href="<?= site_url('item/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Create</a>
			</div>

		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>#</th>
						<th>Barcode</th>
						<th>Nama</th>
						<th>Category</th>
						<th>Unit</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Image</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; 
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%;"><?= $no++?>.</td>
						<td><?= $data->barcode?></td>
						<td><?= $data->name?></td>
						<td><?= $data->nama_kategori?></td>
						<td><?= $data->nama_unit?></td>
						<td><?= $data->harga?></td>
						<td><?= $data->stok?></td>
						<td>
							<?php if($data->image != null ) { ?>
								<img src="<?= base_url('uploads/product/'. $data->image)?>" style="width:50px">
							<?php } ?>
						</td>
						<td class="text-center" width="160px">
							<a href="<?= site_url('item/edit/'.$data->item_id)?>" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-pencil"></i> Update</a>		
							<a href="<?= site_url('item/delete/'.$data->item_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>		
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</section>
