<section class="content-header">
	<h1>
		Users
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Users</h3>
			<div class="pull-right">
				<a href="<?= site_url('user/tambah')?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i> Create</a>
			</div>

		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; 
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width:5%;"><?= $no++?>.</td>
						<td><?= $data->username?></td>
						<td><?= $data->name?></td>
						<td><?= $data->address?></td>
						<td><?= $data->level == 1 ? "Admin" : "Kasir"?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('user/delete')?>" method="post">
								<a href="<?= site_url('user/edit/'.$data->user_id)?>" class="btn btn-success btn-xs btn-flat"><i class="fa fa-pencil"></i> Update</a>
								<input type="hidden" name="user_id" value="<?= $data->user_id?>">
								<button onclick="return confirm('Yakin hapus data??')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</button>
							</form>
							</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</section>
