<link rel="shortcut icon" href="assets/icon/akar.ico">
<div class="col-xs-12">
    <br>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">PROFILE <?= strtoupper($karyawan['username']); ?></h3>
        </div>

        <div class="panel-body">
            <div class="row">
                
                <div class="col-xs-4 col-sm-2">
                    <img src="<?= base_url('assets/photo/').$karyawan['foto']; ?>" alt="" class="img-responsive img-circle">
                </div>

                <div class="col-xs-8 col-sm-10">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <th>Info pribadi : </th>
                                <th>Info pekerjaan : </th>
                                <th>Info kontak : </th>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>Nama : <?= $karyawan['awalan'] .' '. $karyawan['nama_depan'] .' '. $karyawan['nama_tengah'] .' '. $karyawan['nama_belakang'] .' '. $karyawan['akhiran']; ?></td>
                                    <td>Jabatan : <?= $karyawan['jabatan']; ?></td>
                                    <td>
                                        Alamat : <?= $karyawan['jalan_no'] .', RT. '. $karyawan['rt'] .', RW. '. $karyawan['rw'] .', '. $karyawan['desa_kel'] .', '. $karyawan['kecamatan'] .', '. $karyawan['kota'] .' '. $karyawan['kd_pos']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Tempat lahir : <?= $karyawan['tem_lahir']; ?></td>
                                    <td>Status pegawai : <?= $karyawan['status_kepegawaian']; ?></td>
                                    <td>Email : <?= $karyawan['email']; ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal lahir : <?= $karyawan['tgl_lahir']; ?></td>
                                    <td>Tanggal masuk kerja : <?= $karyawan['tgl_mulai_bekerja']; ?></td>
                                    <td>Nomer telepon : <?= $karyawan['telepon']; ?></td>
                                </tr>

                                <tr>
                                    <td>Status : <?= $karyawan['status']; ?></td>
                                    <td>Nomer NPWP : <?= $karyawan['no_npwp']; ?></td>
                                    <td>Nomer KTP : <?= $karyawan['no_ktp']; ?></td>
                                </tr>

                                <tr>
                                    <td>Agama : <?= $karyawan['agama']; ?></td>
                                    <td>Nomer BPJS ketenagakerjaan : <?= $karyawan['no_bpjs_ketenagakerjaan']; ?></td>
                                    <td>Nomer Kartu Keluarga : <?= $karyawan['no_kk']; ?></td>
                                </tr>

                                <tr>
                                    <td>Jenis kelamin : <?= $karyawan['j_kel']; ?></td>
                                    <td>Nomer BPJS kesehatan : <?= $karyawan['no_bpjs_kesehatan']; ?></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>Akun Bank : <?= $karyawan['bank'] .' || '. $karyawan['no_rek']; ?></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>