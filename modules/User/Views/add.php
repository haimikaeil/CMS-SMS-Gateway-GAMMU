<?= $this->extend('template/template') ?>
<?= $this->section('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Form Tambah <?= ucwords(@$this->title) ?>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="<?= site_url($cname . '/do_tambah')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'username')) ?></label>
							<div class="col-md-2">
								<input class="form-control" type="text" name="username" placeholder="<?= ucwords(str_replace('_', ' ', 'username')) ?>" value="<?= @session()->get('data_post')->username ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'nama')) ?></label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="nama" placeholder="<?= ucwords(str_replace('_', ' ', 'nama')) ?>" value="<?= @session()->get('data_post')->nama ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'email')) ?></label>
							<div class="col-md-3">
								<input class="form-control" type="email" name="email" placeholder="<?= ucwords(str_replace('_', ' ', 'email')) ?>" value="<?= @session()->get('data_post')->email ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'no_telp')) ?></label>
							<div class="col-md-2">
								<input class="form-control" type="text" name="no_telp" placeholder="<?= ucwords(str_replace('_', ' ', 'no_telp')) ?>" value="<?= @session()->get('data_post')->no_telp ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'password')) ?></label>
							<div class="col-md-2">
								<input class="form-control" type="password" name="password" placeholder="<?= ucwords(str_replace('_', ' ', 'password')) ?>" value="" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'confirm_password')) ?></label>
							<div class="col-md-2">
								<input class="form-control" type="password" name="confirm_password" placeholder="<?= ucwords(str_replace('_', ' ', 'confirm_password')) ?>" value="" required />
							</div>
						</div>

					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-9">
								<button type="submit" class="btn green">Simpan</button>
								<a href="<?= site_url($cname) ?>" class="btn default">Kembali</a>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>