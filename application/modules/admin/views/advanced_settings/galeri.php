<div id="galeri">
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
    <h1><img src="<?= base_url('assets/imgs/filemanager.png') ?>" class="header-img" style="margin-top:-2px;"> Galeri</h1>
    <hr><div style="margin-bottom: 20px;">
    <a href="<?= base_url('admin/newgaleri') ?>" data-toggle="modal" data-target="" class="btn btn-primary pull-left">
        <b>+</b> TAMBAH GALERI
    </a>
    
    <div class="clearfix"></div>
</div>
    <div class="row">
        <div class="col-xs-12">
            
            <hr>
            <?php
            if ($galeri) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Keterangan</th>
                               
                              
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($galeri as $row) {
                                $u_path = 'attachments/galeri/';
                                if ($row->image != null && file_exists($u_path . $row->image)) {
                                    $image = base_url($u_path . $row->image);
                                } else {
                                    $image = base_url('attachments/no-image.png');
                                }
                                ?>

                                <tr>
                                    <td>
                                        <img src="<?= $image ?>" alt="No Image" class="img-thumbnail" style="height:100px;">
                                    </td>
                                    <td>
                                        <?= $row->title ?>
                                    </td>
                                    <td>
                                        <?= $row->description ?>
                                    </td>
                                  
                                                                  
                                   
                                    <td>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/newgaleri/' . $row->id) ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= base_url('admin/galeri?delete=' . $row->id) ?>"  class="btn btn-danger confirm-delete">Delete</a>
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
            <div class ="alert alert-info">No galeri found!</div>
        <?php } ?>
    </div>