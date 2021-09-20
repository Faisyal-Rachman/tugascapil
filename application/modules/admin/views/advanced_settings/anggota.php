<div id="siswa">
    <?php
    if ($this->session->flashdata('result_delete')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
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
    <h1><img src="<?= base_url('assets/imgs/filemanager.png') ?>" class="header-img" style="margin-top:-2px;">Data Akta Kelahiran</h1>
    <hr>
    <div class="row">
        <div class="col-xs-12">

            <?php
            if ($aktalahir) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                          
								<th>No. KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Nama Ibu</th>
								 <th class="text-center">Nama Ayah</th>
							                              
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($aktalahir as $row) {
                                                              ?>

                                <tr>
                             
									 <td>
                                        <small><?= $row->kk_ortu ?> </small>
                                    </td>
                                    <td>
                                        <?= $row->nama_ortu ?>
                                    </td>
                                    <td>
                                        <small><?= $row->nama_ibu ?></small>
                                    </td>
                                    <td class="text-center">
                                    <small><?= $row->nama_ayah ?></small>
                            </td>
								
                                    <td class="text-center" data-action-id="<?= $row->id; ?>">
                                <?php ?>
                                <div class="status" style="padding:2px; font-size:13px;">
                                
                                </div>
                                        <div class="pull-right">

                                        <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $row->id; ?>, 1, '<?= htmlentities($row->nama_bayi) ?>', '<?= $row->nama_bayi; ?>')" class="btn btn-success btn-xs">Setujui</a></div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $row->id; ?>, 0)" class="btn btn-danger btn-xs">Tidak Disetujui</a></div>
                                
  </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?= $links_pagination ?>
            </div>
            <?php
        } else {
            ?>
            <div class ="alert alert-info">Belum ada data siswa!</div>
        <?php } ?>
    </div>
    <script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>