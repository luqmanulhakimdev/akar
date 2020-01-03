<script>
    $(function(){
        $("#tanggal_kerja").datepicker();
        $("#tgl-lahir").datepicker();
    });
</script>
<div class="col-xs-12">
    <br>
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">Profile Karyawan:  <?= strtoupper($karyawan['nama_depan']); ?></h3>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-xs-4 col-sm-2">
                    <img src="<?= base_url('assets/photo/').$karyawan['foto']; ?>" alt="" class="img-responsive img-circle">
                </div>

                <div class="col-xs-8 col-sm-10">
                    <div class="table-responsive">

                        <table class="table table-striped dt-responsive nowrap" id="dataTable">
                            <thead>
                                <th>Info pribadi : </th>
                                <th>Info pekerjaan : </th>
                                <th>Info kontak : </th>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>
                                        Nama : <?= $karyawan['awalan'] .' '. $karyawan['nama_depan'] .' '. $karyawan['nama_tengah'] .' '. $karyawan['nama_belakang'] .' '. $karyawan['akhiran']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#nama" id="md_nama">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    
                                    
                                    <td>
                                        Jabatan : <?= $karyawan['jabatan']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#jabatan">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        <?php if($karyawan['kota_domisili'] == ''): ?>
                                            Alamat : <?= $karyawan['jalan_no'] .', RT. '. $karyawan['rt'] .', RW. '. $karyawan['rw'] .', '. $karyawan['desa_kel'] .', '. $karyawan['kecamatan'] .', '. $karyawan['kota'] .' '. $karyawan['kd_pos']; ?>
                                            
                                            <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                                <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#alamat">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        Edit
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Alamat : <?= $karyawan['jalan_no_domisili'] .', RT. '. $karyawan['rt_domisili'] .', RW. '. $karyawan['rw_domisili'] .', '. $karyawan['desa_kel_domisili'] .', '. $karyawan['kecamatan_domisili'] .', '. $karyawan['kota_domisili'] .' '. $karyawan['kd_pos_domisili']; ?>
                                            
                                            <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                                <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#alamat_domisili">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        Edit
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Tempat lahir : <?= $karyawan['tem_lahir']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#tempatlahir">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Status pegawai : <?= $karyawan['status_kepegawaian']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#status_kepegawaian">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Email : <?= $karyawan['email']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#email">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Tanggal lahir : <?= $karyawan['tgl_lahir']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#tanggallahir">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        Tanggal masuk kerja : <?= $karyawan['tgl_mulai_bekerja']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#tanggal_mulai_bekerja">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer telepon : <?= $karyawan['telepon']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#telepon">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Status : <?= $karyawan['status']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#status">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer NPWP : <?= $karyawan['no_npwp']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#no_npwp">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer KTP : <?= $karyawan['no_ktp']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#no_ktp">
                                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                              Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Agama : <?= $karyawan['agama']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#agama">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer BPJS ketenagakerjaan : 
                                        <?= $karyawan['no_bpjs_ketenagakerjaan']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#bpjs">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer Kartu Keluarga : <?= $karyawan['no_kk']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#no_kk">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Jenis kelamin : <?= $karyawan['j_kel']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#jenis_kelamin">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        Nomer BPJS kesehatan : <?= $karyawan['no_bpjs_kesehatan']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#bpjs">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        Akun Bank : <?= $karyawan['bank'] .' || '. $karyawan['no_rek']; ?>
                                        
                                        <?php if($this->session->userdata('user_status') == 'admin'): ?>
                                            <a href="" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#akunbank">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            
            
        </div>
        
        <div class="panel-footer text-right">
            <?php if($this->session->userdata('user_status') == 'admin'): ?>
                <a href="" class="btn btn-success" data-toggle="modal" data-target="#photo">
                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                        Upload photo
                </a>
            <?php else: ?>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#password">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        Ubah password
                </a>
            <?php endif; ?>

                

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

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/nama/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="gelar_depan" class="control-label">Gelar depan : </label>
                        <input type="text" name="awalan" class="form-control" id="gelar_depan" value="<?= $karyawan['awalan']; ?>" placeholder="Gelar depan"><br>
                        
                        <label for="nama_depan" class="control-label">Nama depan : </label>
                        <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="<?= $karyawan['nama_depan']; ?>" placeholder="Nama depan"><br>
                        
                        <label for="nama_tengah" class="control-label">Nama tengah : </label>
                        <input type="text" name="nama_tengah" class="form-control" id="nama_tengah" value="<?= $karyawan['nama_tengah']; ?>" placeholder="Nama tengah"><br>
                        
                        <label for="nama_belakang" class="control-label">Nama belakang : </label>
                        <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" value="<?= $karyawan['nama_belakang']; ?>" placeholder="Nama belakang"><br>
                        
                        <label for="gelar_belakang" class="control-label">Nama belakang : </label>
                        <input type="text" name="akhiran" class="form-control" id="gelar_belakang" value="<?= $karyawan['akhiran']; ?>" placeholder="Gelar akhiran"><br>
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>

<div class="modal fade" id="tanggallahir" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/tgl_lahir/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl-lahir" class="control-label">Tanggal Lahir : </label>
                        <input type="text" name="tgl_lahir" class="form-control" id="tgl-lahir" value="<?= $karyawan['tgl_lahir']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            <?php echo form_close(); ?>
                  
        </div>
    </div>
</div>
                 
<div class="modal fade" id="tempatlahir" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
                              
            <?php echo form_open('edit_profile/tem_lahir/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="tmp-lahir" class="control-label">Tempat Lahir : </label>
                        <input type="text" name="tem_lahir" class="form-control" id="tmp-lahir" value="<?= $karyawan['tem_lahir']; ?>">
                    </div>
                </div>
            
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>    
                
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>

<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/status/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="statusku" class="control-label">Status : </label>
                        <input type="text" name="status" class="form-control" id="statusku" value="<?= $karyawan['status']; ?>">
                    </div>
                </div>

                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
                                     
        </div>
    </div>
</div>

<div class="modal fade" id="agama" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/agama/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="agamaku" class="control-label">Agama : </label>
                        <select name="agama" class="form-control" id="agamaku">
                           
                            <option>---Pilih untuk mengganti---</option>
                            <option value="Islam">Islam</option>
                            <option value=">Kristen protesta">Kristen protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            
                        </select>
                    </div>
                </div>

                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>

        </div>
    </div>    
</div>

<div class="modal fade" id="jenis_kelamin" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/j_kel/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                       
                        <label for="jenis-kelamin" class="control-label">Jenis kelamin : </label>
                        <select name="j_kel" class="form-control">
                           
                            <option>---Pilih untuk menganti---</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            
                        </select>
                        
                    </div>
                </div>
                   
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                    
            <?php echo form_close(); ?>
       
        </div>
    </div>
</div>

<div class="modal fade" id="jabatan" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/jabatan/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="jabatanku" class="control-label">Jabatan : </label>
                        <input type="text" name="jabatan" class="form-control" id="jabatanku" value="<?= $karyawan['jabatan']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
        
        </div>
    </div>
</div>

<div class="modal fade" id="status_kepegawaian" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header" style="background-color: #f7f7f7;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <h4 class="modal-title">EDIT PROFILE</h4>
        </div>
        
        <?php echo form_open('edit_profile/status_kepegawaian/'. $this->uri->segment(3)); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="status_kepegawaianku" class="control-label">Status kepegawaian : </label>
                    <input type="text" name="status_kepegawaian" class="form-control" id="status_kepegawaianku" value="<?= $karyawan['status_kepegawaian']; ?>">
                </div>
            </div>
                
            <div class="modal-footer" style="background-color: #f7f7f7;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        <?php echo form_close(); ?>
           
        </div>
    </div>
</div>

<div class="modal fade" id="tanggal_mulai_bekerja" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/tanggal_mulai_bekerja/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_kerja" class="control-label">Tanggal mulai bekerja : </label>
                        <input type="text" name="tgl_mulai_bekerja" class="form-control" id="tanggal_kerja" value="<?= $karyawan['tgl_mulai_bekerja']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>

              
        </div>
    </div>
</div>

<div class="modal fade" id="no_npwp" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/no_npwp/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="npwpku" class="control-label">Nomer NPWP : </label>
                        <input type="text" name="no_npwp" class="form-control" id="npwpku" value="<?= $karyawan['no_npwp']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

             <?php echo form_close(); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="bpjs" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/bpjs/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="bpjs_kesehatan" class="control-label">Nomer BPJS kesehatan: </label>
                        <input type="number" name="bpjs_kesehatan" class="form-control" id="bpjs_kesehatan" value="<?= $karyawan['no_bpjs_kesehatan']; ?>">
                    </div>
                          
                    <div class="form-group">
                        <label for="bpjs_ketenagakerjaan" class="control-label">Nomer BPJS ketenagakerjaan : </label>
                        <input type="number" name="bpjs_ketenagakerjaan" class="form-control" id="bpjs_ketenagakerjaan" value="<?= $karyawan['no_bpjs_ketenagakerjaan']; ?>">
                    </div>
                </div>
                    
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
                
        </div>
    </div>
</div>

<div class="modal fade" id="akunbank" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/bank/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank" class="control-label">Nama bank : </label>
                        <input type="text" name="bank" class="form-control" id="bank" value="<?= $karyawan['bank']; ?>" placeholder="Nama bank">
                    </div>
                       
                    <div class="form-group">
                        <label for="rekening" class="control-label">Nomer rekening : </label>
                        <input type="number" name="no_rek" class="form-control" id="rekening" value="<?= $karyawan['no_rek']; ?>" placeholder="Nomer rekening">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
       
        </div>
    </div>
</div>

<div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/alamat/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kota" class="control-label">Kota : </label>
                        <input type="text" name="kota" class="form-control" id="kota" value="<?php echo $karyawan['kota']; ?>" placeholder="Kota">
                    </div>
                        
                    <div class="form-group">
                        <label for="kecamatan" class="control-label">Kecamatan : </label>
                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?= $karyawan['kecamatan']; ?>" placeholder="Kecamatan">
                    </div>
                        
                    <div class="form-group">
                        <label for="kelurahan" class="control-label">Kelurahan : </label>
                        <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?= $karyawan['desa_kel']; ?>" placeholder="Kelurahan">
                    </div>
                        
                    <div class="form-group">
                        <label for="jalan_no" class="control-label">Jalan dan Nomer rumah : </label>
                        <input type="text" name="jalan" class="form-control" id="jalan_no" value="<?= $karyawan['jalan_no']; ?>" placeholder="Jalan & nomer rumah">
                    </div>
                        
                    <div class="form-group">
                        <label for="rw" class="control-label">RW : </label>
                        <input type="text" name="rw" class="form-control" id="rw" value="<?= $karyawan['rw']; ?>" placeholder="RW">
                    </div>
                        
                    <div class="form-group">
                        <label for="rt" class="control-label">RT : </label>
                        <input type="text" name="rt" class="form-control" id="rt" value="<?= $karyawan['rt']; ?>" placeholder="RT">
                    </div>
                        
                    <div class="form-group">
                        <label for="kd_pos" class="control-label">Kode POS : </label>
                        <input type="text" name="kode_pos" class="form-control" id="kd_pos" value="<?= $karyawan['kd_pos']; ?>" placeholder="Kode pos">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>

<div class="modal fade" id="alamat_domisili" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/alamat_domisili/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kota_domisili" class="control-label">Kota domisili : </label>
                        <input type="text" name="kota_domisili" class="form-control" id="kota_domisili" value="<?= $karyawan['kota_domisili']; ?>" placeholder="Kota">
                    </div>
                        
                    <div class="form-group">
                        <label for="kecamatan_domisili" class="control-label">Kecamatan domisili : </label>
                        <input type="text" name="kecamatan_domisili" class="form-control" value="<?= $karyawan['kecamatan_domisili']; ?>" placeholder="Kecamatan">
                    </div>
                        
                    <div class="form-group">
                        <label for="kelurahan_domisili" class="control-label">Kelurahan domisili : </label>
                        <input type="text" name="kelurahan_domisili" class="form-control" value="<?= $karyawan['desa_kel_domisili']; ?>" placeholder="Kelurahan">
                    </div>
                        
                    <div class="form-group">
                        <label for="jalan_no_domisili" class="control-label">Jalan dan Nomer rumah domisili : </label>
                        <input type="text" name="jalan_domisili" class="form-control" id="jalan_no_domisili" value="<?= $karyawan['jalan_no_domisili']; ?>" placeholder="Jalan & nomer rumah">
                    </div>
                        
                    <div class="form-group">
                        <label for="rw_domisili" class="control-label">RW domisili : </label>
                        <input type="text" name="rw_domisili" class="form-control" id="rw_domisili" value="<?= $karyawan['rw_domisili']; ?>" placeholder="RW">
                    </div>
                        
                    <div class="form-group">
                        <label for="rt_domisili" class="control-label">RT domisili : </label>
                        <input type="text" name="rt_domisili" class="form-control" id="rt_domisili" value="<?= $karyawan['rt_domisili']; ?>" placeholder="RT">
                    </div>
                        
                    <div class="form-group">
                        <label for="kd_pos_domisili" class="control-label">Kode POS domisili : </label>
                        <input type="text" name="kode_pos_domisili" class="form-control" id="kd_pos_domisili" value="<?= $karyawan['kd_pos_domisili']; ?>" placeholder="Kode pos">
                    </div>
                </div>
                    
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            <?php echo form_close(); ?>
           
        </div>
    </div>
</div>

<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/email/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailku" class="control-label">Email : </label>
                        <input type="text" name="email" class="form-control" id="emailku" value="<?= $karyawan['email']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close(); ?>       
                        
        </div>
    </div>
</div>

<div class="modal fade" id="telepon" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/telepon/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="teleponku" class="control-label">Telepon : </label>
                        <input type="text" name="telepon" class="form-control" id="teleponku" value="<?= $karyawan['telepon']; ?>">
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            <?php echo form_close(); ?>
                          
        </div>
    </div>
</div>

<div class="modal fade" id="no_ktp" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/no_ktp/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="ktpku" class="control-label">Nomer KTP : </label>
                        <input type="number" name="no_ktp" class="form-control" id="ktpku" value="<?= $karyawan['no_ktp']; ?>"> 
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close(); ?>
                         
        </div>
    </div>
</div>

<div class="modal fade" id="no_kk" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php echo form_open('edit_profile/no_kk/'. $this->uri->segment(3)); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="kkku" class="control-label">Nomer kartu keluarga : </label>
                        <input type="number" name="no_kk" class="form-control" id="kkku" value="<?= $karyawan['no_kk']; ?>">
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

            <?php echo form_open_multipart('edit_profile/photo/'. $this->uri->segment(3)); ?>

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
                 
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title">EDIT PROFILE</h4>
            </div>
            
            <?php if($this->session->userdata('user_status') == 'admin'): ?>
                <?php echo form_open('edit_profile/password/'. $this->uri->segment(3)); ?>
            <?php else: ?>
                <?php echo form_open('edit_profile/password'); ?>
            <?php endif; ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="passwordku" class="control-label">Password Lama : </label>
                        <input type="password" name="password" class="form-control" id="passwordku">
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