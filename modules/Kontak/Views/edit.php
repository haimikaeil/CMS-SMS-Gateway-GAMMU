<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Form Edit <?= ucwords(@$title) ?>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="<?= site_url($cname . '/do_ubah')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'nama')) ?></label>
							<div class="col-md-5">
								<input class="form-control" type="text" name="nama" placeholder="<?= ucwords(str_replace('_', ' ', 'nama')) ?>" value="<?= @$item->nama ?>" required />
								<input class="form-control" type="hidden" name="id_kontak" placeholder="<?= ucwords(str_replace('_', ' ', 'id_kontak')) ?>" value="<?= @$item->id_kontak ?>" required readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'nomor')) ?></label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="nomor" placeholder="<?= ucwords(str_replace('_', ' ', 'nomor')) ?>" value="<?= @$item->nomor ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'alamat')) ?></label>
							<div class="col-md-5">
								<textarea class="form-control" name="alamat" rows="6" required><?= @$item->alamat ?></textarea>
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