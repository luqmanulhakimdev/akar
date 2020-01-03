<br>
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <form action="<?php echo base_url('search/karyawan'); ?>" method="get" class="form-inline">
           
            <div class="form-group">
                <div class="input-group">
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </span>
                    <input type="search" name="key" placeholder="Cari nama atau jabatan..." class="form-control">
                    
                </div>
            </div>
                        
            <input type="submit" name="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
                
    <div class="col-sm-6 col-xs-12 text-right">
        <?php if($this->session->userdata('user_status') == 'admin'): ?>
            <a href="<?= site_url('input_karyawan'); ?>" class="btn btn-primary">Input karyawan</a>
        <?php endif; ?>
    </div>
</div>  
            
<br>
<div class="table-responsive">
    <table class="table table-bordered table-striped dt-responsive nowrap" id="dataTable">
        <thead>
            <th>No : </th>
            <th>Nama : </th>
            <th>Jabatan : </th>
            <th>Alamat : </th>
            <th>Jenis Kelamin : </th>
            <th>Tempat Lahir: </th>
            <th>Tanggal Lahir : </th>
            <th>Agama :</th>
            <th>No KTP:</th>
            <th>No Telepon:</th>
            <th>Email:</th>
            <th>Opsi : </th>
        </thead>

        <tbody>
            <?php $no = 1; foreach($karyawan as $row): ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <?= $row['awalan'] .' '. $row['nama_depan'] .' '. $row['nama_tengah'] .' '. $row['nama_belakang'] .' '. $row['akhiran']; ?>
                </td>
                <td><?= $row['jabatan']; ?></td>
                <td><?= $row['jalan_no'] .', '. $row['kota']; ?></td>
                <td><?= $row['j_kel']; ?></td>
                <td><?= $row['tem_lahir']; ?></td>
                <td><?= $row['tgl_lahir']; ?></td>
                <td><?= $row['agama']; ?></td>
                <td> <?= $row['telepon']?> </td>
                <td> <?= $row['no_ktp']?> </td>
                <td> <?= $row['email']?> </td>
                <td><a href="<?php echo base_url('admin/detail/'. $row['id']); ?>" class="btn btn-primary">Detail</a></td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>
            
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $links; ?>
    </ul>
</nav>