<link rel="shortcut icon" href="assets/icon/akar.ico">
<div class="col-xs-12 col-sm-9 col-md-7">
    <br>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">Profile Admin :  <?= strtoupper($data['nama_depan']); ?></h3>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-xs-4 col-sm-2">
                    <img src="<?= base_url('assets/photo/').$data['foto']; ?>" alt="" class="img-responsive img-circle">
                </div>

                <div class="col-xs-8 col-sm-10">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <th>Data : </th>
                                <th>Nilai : </th>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>Nama : 
                                    </td>
                                    
                                    <td>
                                        <?= $data['awalan'] .' '. $data['nama_depan'] .' '. $data['nama_tengah'] .' '. $data['nama_belakang'] .' '. $data['akhiran']; ?>
                                        
                                        <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#nama">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            Edit
                                        </a>
                                    </td>
                                    
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        
        <div class="panel-footer text-right">
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#photo">
                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                    Upload photo
            </a>
            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#password">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    Ubah password
            </a>
        </div>
        
    </div>
</div>


<!-- start Modal -->
<div class="modal fade" id="nama" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal-label">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('admin/edit/nama'); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama : </label>
                        <input type="text" name="awalan" class="form-control" value="<?php echo $data['awalan']; ?>" placeholder="Gelar depan">
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="nama_depan" class="form-control" value="<?php echo $data['nama_depan']; ?>" placeholder="Nama depan *">
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="nama_tengah" class="form-control" value="<?php echo $data['nama_tengah']; ?>"  placeholder="Nama tengah">
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="nama_belakang" class="form-control" value="<?php echo $data['nama_belakang']; ?>" placeholder="Nama belakang *">
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="akhiran" class="form-control" value="<?php echo $data['akhiran']; ?>" placeholder="Gelar akhiran">
                    </div>
                    
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <span class="pull-lef">Note (*) required</span>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal-label">EDIT PROFILE</h4>
            </div>

            <?php echo form_open('admin/edit/password'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="password" class="control-label">Password Lama : </label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="form-group">
                    <label for="new-password" class="control-label">Password Baru : </label>
                    <input type="password" name="new-password" class="form-control" id="new-password">
                </div>

                <div class="form-group">
                    <label for="repassword" class="control-label">Ulangi Password : </label>
                    <input type="password" name="repassword" class="form-control" id="repassword">
                </div>
            </div>

            <div class="modal-footer" style="background-color: #f7f7f7;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal-label">EDIT PROFILE</h4>
            </div>

            <?php echo form_open_multipart('admin/edit/photo'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="photo-profile" class="control-label">Foto Profile : </label>
                    <input type="file" name="photo" class="form-control" id="photo-profile">
                </div>
            </div>

            <div class="modal-footer" style="background-color: #f7f7f7;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>