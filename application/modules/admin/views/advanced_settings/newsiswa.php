<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<h1><img src="<?= base_url('assets/imgs/filemanager.png') ?>" class="header-img" style="margin-top:-3px;"> Siswa</h1>
<hr>

<?php
$timeNow = time();
if (validation_errors()) {
    ?>
    <hr>
    <div class="alert alert-danger"><?= validation_errors() ?></div>
    <hr>
    <?php
}
if ($this->session->flashdata('result_publish')) {
    ?>
    <hr>
    <div class="alert alert-success"><?= $this->session->flashdata('result_publish') ?></div>
    <hr>
    <?php
}
?>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" value="<?= isset($_POST['folder']) ? $_POST['folder'] : $timeNow ?>" name="folder">

    <?php
    $i = 0;
    foreach ($languages as $language) {
        ?>
        <div class="locale-container locale-container-<?= $language->abbr ?>" <?= $language->abbr == MY_DEFAULT_LANGUAGE_ABBR ? 'style="display:block;"' : '' ?>>
            <input type="hidden" name="translations[]" value="<?= $language->abbr ?>">
            <div class="form-group"> 
                <label>Judul </label>
                <input type="text" name="title" maxlength="50" value="<?= $trans_load != null && isset($trans_load[$language->abbr]['title']) ? $trans_load[$language->abbr]['title'] : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="description<?= $i ?>">Alamat </label>
                   <input type="text" name="description[]" maxlength="50" value="<?= $trans_load != null && isset($trans_load[$language->abbr]['description']) ? $trans_load[$language->abbr]['description'] : '' ?>" class="form-control">
           
            </div>
			 <div class="form-group">
                <label for="description<?= $i ?>">Nik </label>
                   <input type="text" name="nik" maxlength="50" value="<?= @$_POST['nik'] ?>" class="form-control">
           
            </div>
            <div class="form-group">
                <label for="description<?= $i ?>">Tanggal Lahir</label>
                <input name="tanggal" class="form-control datepicker" maxlength="50" value="<?= @$_POST['tanggal'] ?>" type="text" class="form-control">
                   
            </div>
        </div>
        <?php
        $i++;
    }
    ?>
    <div class="form-group bordered-group">
        <?php
        if (isset($_POST['image']) && $_POST['image'] != null) {
            $image = 'attachments/siswa/' . $_POST['image'];
            if (!file_exists($image)) {
                $image = 'attachments/no-image.png';
            }
            ?>
            <p>Current image:</p>
            <div>
                <img src="<?= base_url($image) ?>" class="img-responsive img-thumbnail" style="max-width:300px; margin-bottom: 5px;">
            </div>
            <input type="hidden" name="old_image" value="<?= $_POST['image'] ?>">
            <?php if (isset($_GET['to_lang'])) { ?>
                <input type="hidden" name="image" value="<?= $_POST['image'] ?>">
                <?php
            }
        }
        ?>
        <label for="userfile">Foto </label>
        <input type="file" id="userfile" name="userfile">
    </div>

    <div class="form-group for-shop">
        <label>Jenis kelamin</label>
         <select class="selectpicker form-control show-tick show-menu-arrow" name="jnk">
		  <option value="<?= @$_POST['jnk'] ?>" default><?= @$_POST['jnk'] ?>
            <option value="Laki - laki">Laki - laki
                </option>
				<option value="Perempuan">Perempuan
                </option>
           
        </select>
    </div>
  <div class="form-group for-shop">
        <label>Kelas</label>
         <select class="selectpicker form-control show-tick show-menu-arrow" name="kelas">
		  <option value="<?= @$_POST['kelas'] ?>" default><?= @$_POST['kelas'] ?>
                </option>
            <option value="Tata - Boga">Tata Boga
                </option>
				<option value="Akuntansi">Akuntansi
                </option>
           
        </select>
    </div>
	  <div class="form-group for-shop">
        <label>Agama</label>
         <select class="selectpicker form-control show-tick show-menu-arrow" name="agama">
		  <option value="<?= @$_POST['agama'] ?>" default><?= @$_POST['agama'] ?>
            <option value="Islam">Islam
                </option>
				<option value="Kristen">Kristen
                </option>
				<option value="Hindu">Hindu
                </option>
				<option value="Budha">Budha
                </option>
           
        </select>
    </div>
    <?php if ($showBrands == 1) { ?>
        <div class="form-group for-shop">
            <label>Brand</label>
            <select class="selectpicker" name="brand_id">
                <?php foreach ($brands as $brand) { ?>
                    <option <?= isset($_POST['brand_id']) && $_POST['brand_id'] == $brand['id'] ? 'selected' : '' ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } if ($virtualProducts == 1) { ?>
        <div class="form-group for-shop">
            <label>Virtual Products <a href="javascript:void(0);" data-toggle="modal" data-target="#virtualProductsHelp"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <textarea class="form-control" name="virtual_products"><?= @$_POST['virtual_products'] ?></textarea>
        </div>
    <?php } ?>
  
    <button type="submit" name="submit" class="btn btn-lg btn-default btn-publish">OKE SIMPAN</button>
    <?php if ($this->uri->segment(3) !== null) { ?>
        <a href="<?= base_url('admin/siswa') ?>" class="btn btn-lg btn-default">Cancel</a>
    <?php } ?>
</form>
<!-- Modal Upload More Images -->
<div class="modal fade" id="modalMoreImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload more images</h4>
            </div>
            <div class="modal-body">
                <form id="uploadImagesForm">
                    <input type="hidden" value="<?= isset($_POST['folder']) ? $_POST['folder'] : $timeNow ?>" name="folder">
                    <label for="others">Select images</label>
                    <input type="file" name="others[]" id="others" multiple />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default finish-upload">
                    <span class="finish-text">Finish</span>
                    <img src="<?= base_url('assets/imgs/load.gif') ?>" class="loadUploadOthers" alt="">
                </button>
            </div>
        </div>
    </div>
</div>
<!-- virtualProductsHelp -->
<div class="modal fade" id="virtualProductsHelp" tabindex="-1" role="dialog" aria-labelledby="virtualProductsHelp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">What are virtual products?</h4>
            </div>
            <div class="modal-body">
                Sometimes we want to sell products that are for electronic use such as books. In the box below, you can enter links to products that can be downloaded after you confirm the order as "Processed" through the "Orders" tab, an email will be sent to the customer entered with the entire text entered in the "virtual products" field.
                We have left only the possibility to add links in this field because sometimes it is necessary that the electronic stuff you provide for downloading will be uploaded to other servers. If you want, you can add your files to "file manager" and take the links to them to add to the "virtual products"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>
<script>
                      $(document).ready(function () {
                        $('.datepicker').datepicker({
                            format: "yyyy-mm-dd"
                        });
                         });
                       
</script>