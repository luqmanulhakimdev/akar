<script>
    $(function(){
        $("#date").datepicker();
        $("#date1").datepicker();
    });
</script>

<?php echo form_open_multipart('input_karyawan'); ?>

    <div class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
           
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Info Pribadi
                        </a>
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
  
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Data : </th>
                                    <th>Nilai : </th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Nama lengkap : </td>
                                        <td>
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="awalan" placeholder="Gelar depan" class="form-control col-sm-1">
                                                    <?php echo form_error('awalan'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="nama_depan" placeholder="Nama depan *" class="form-control">
                                                    <?php echo form_error('nama_depan'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="nama_tengah" placeholder="Nama tengah" class="form-control">
                                                    <?php echo form_error('nama_tengah'); ?>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="nama_belakang" placeholder="Nama belakang" class="form-control">
                                                    <?php echo form_error('nama_belakang'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="akhiran" placeholder="Gelar belakang" class="form-control">
                                                    <?php echo form_error('akhiran'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tempat &amp; Tanggal lahir * : </td>
                                        <td>
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="tem_lahir" placeholder="Tempat lahir" class="form-control">
                                                    <?php echo form_error('tem_lahir'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="tgl_lahir" placeholder="Tanggal lahir" class="form-control" id="date">
                                                    <?php echo form_error('tgl_lahir'); ?>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis kelamin * :  </td>
                                        <td>
                                            <select name="j_kel" class="form-control">
                                                <option value="default">--- Jenis Kelamin ---</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <?php echo form_error('j_kel'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Agama * : </td>
                                        <td>
                                            <select name="agama" class="form-control">
                                                <option value="default">--- Agama ---</option>
                                                <option value="Islam">Islam</option>
                                                <option value="kristen Potestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            <?php echo form_error('agama'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status * : </td>
                                        <td>
                                            <input type="text" name="status" placeholder="Status"class="form-control">
                                            <?php echo form_error('status'); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            
                        </div>
                   
                    </div>
                </div>
            </div>
                
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Info Kontak
                        </a>
                    </h4>
                </div>
                
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Data : </th>
                                    <th>Nilai : </th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Data login * : </td>
                                        <td>
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="username" placeholder="Username" class="form-control">
                                                    <?php echo form_error('username'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                                    <?php echo form_error('password'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="alamatAsal">
                                        <td>Alamat asal : </td>
                                        <td>
                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="jalan_no" placeholder="Jalan dan Nomer rumah * " class="form-control">
                                                    <?php echo form_error('jalan_no'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="rt" placeholder="RT" class="form-control">
                                                    <?php echo form_error('rt'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="rw" placeholder="RW" class="form-control">
                                                    <?php echo form_error('rw'); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="desa_kel" placeholder="Kelurahan / Desa * " class="form-control">
                                                    <?php echo form_error('desa_kel'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="kecamatan" placeholder="Kecamatan * " class="form-control">
                                                    <?php echo form_error('kecamatan'); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="kota" placeholder="Kota * " class="form-control">
                                                    <?php echo form_error('kota'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="number" name="kode_pos" placeholder="Kode pos" class="form-control">
                                                    <?php echo form_error('kode_pos'); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="checkbox col-xs-12">
                                                    <label>
                                                        <input type="checkbox" name="domisili" value="true" id="domisili">
                                                        Apakah alamat domisili Anda berbeda dengan alamat asal?
                                                    </label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr id="alamatDomisili">
                                        <td>Alamat domisili : </td>
                                        <td>

                                           <div class="row">
                                               <div class="form-group col-xs-12 col-sm-4">
                                                   <input type="text" name="jalan_no_domisili" placeholder="Jalan dan Nomer rumah * " class="form-control">
                                                   <?php echo form_error('jalan_no_domisili'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="rt_domisili" placeholder="RT" class="form-control">
                                                    <?php echo form_error('rt_domisili'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-4">
                                                    <input type="text" name="rw_domisili" placeholder="RW" class="form-control">
                                                    <?php echo form_error('rw_domisili'); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="desa_kel_domisili" placeholder="Kelurahan / Desa * " class="form-control">
                                                    <?php echo form_error('desa_kel_domisili'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="kecamatan_domisili" placeholder="Kecamatan * " class="form-control">
                                                    <?php echo form_error('kecamatan_domisili'); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="kota_domisili" placeholder="Kota * " class="form-control">
                                                    <?php echo form_error('kota_domisili'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="number" name="kode_pos_domisili" placeholder="Kode pos" class="form-control">
                                                    <?php echo form_error('kode_pos_domisili'); ?>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Email" class="form-control">
                                                <?php echo form_error('email'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomer telepon * : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="telepon" placeholder="Nomer telepon" class="form-control">
                                                <?php echo form_error('telepon'); ?>
                                            </div>    
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomer KTP * : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="ktp" placeholder="Nomer KTP" class="form-control">
                                                <?php echo form_error('ktp'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomer kartu kerluarga : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="no_kk" placeholder="kartu keluarga"class="form-control">
                                                <?php echo form_error('no_kk'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Foto profile : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="file" name="photo" class="form-control">
                                                <?php echo form_error('photo'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
                   
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                            Info Pekerjaan
                        </a>
                    </h4>
                </div>
                
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Data : </th>
                                    <th>Nilai : </th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Jabatan * : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="jabatan" placeholder="Jabatan" class="form-control">
                                                <?php echo form_error('jabatan'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status pegawai * : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="status_kepegawaian" placeholder="Status pegawai"class="form-control">
                                                <?php echo form_error('status_kepegawaian'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal mulai bekerja * : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="tanggal_mulai_bekerja" placeholder="Mulai bekerja" class="form-control" id="date1">
                                                <?php echo form_error('tanggal_mulai_bekerja'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomer NPWP : </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="no_npwp" placeholder="No npwp" class="form-control">
                                                <?php echo form_error('no_npwp'); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomer BPJS : </td>
                                        <td>
                                            <div class="row">

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="bpjs_ketenagakerjaan" placeholder="Nomer BPJS Ketenagakerjaan" class="form-control">
                                                    <?php echo form_error('bpjs_ketenagakerjaan'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="bpjs_kesehatan" placeholder="Nomer BPJS Kesehatan"class="form-control">
                                                    <?php echo form_error('bpjs_kesehatan'); ?>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Akun Bank : </td>
                                        <td>
                                            <div class="row">

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="nama_bank" placeholder="Nama Bank"class="form-control">
                                                    <?php echo form_error('nama_bank'); ?>
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-6">
                                                    <input type="text" name="no_rekening" placeholder="Nomor Rekening"class="form-control">
                                                    <?php echo form_error('no_rekening'); ?>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>    
                    
        <br>
    
        <span>Note (*) harus diisi.</span><br><br>
        <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-block">
        <br><br>
    
    </div>
<?php echo form_close(); ?>

<script>
    $(document).ready(function(){
        $('#alamatDomisili').hide();
        $("#domisili").on('click', function() {
            $('#alamatDomisili').slideToggle();
        });
    });
</script>