<br>
<div class="row">
    <div class="col-md-6">
        <?php if($this->session->userdata('user_status') == 'admin'): ?>
        <form action="<?php echo base_url('search/absen'); ?>" method="get" class="form-inline">
        <?php elseif($this->session->userdata('user_status') == 'karyawan'): ?>
        <form action="<?php echo base_url('searchku/absen'); ?>" method="get" class="form-inline">
        <?php endif; ?>
            <div class="form-group">
               
                <div class="input-group">
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </span>
                    <?php if($this->session->userdata('user_status') == 'admin'): ?>
                        <input type="search" name="key" placeholder="Cari nama atau tanggal..." class="form-control">
                    <?php elseif($this->session->userdata('user_status') == 'karyawan'): ?>
                        <input type="search" name="key" placeholder="Cari tanggal..." class="form-control">
                    <?php endif; ?>
                    
                    
                </div>
                
            </div>
                        
            <input type="submit" name="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
                
    <div class="col-md-6 text-right">
        <?php if($this->session->userdata('user_status') == 'admin'): ?>
            <a href="<?= site_url('absen/excel'); ?>" class="btn btn-primary">Export excel</a>
        <?php endif; ?>
    </div>
</div>  
            
<br>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <th>No : </th>
            <th>Nama karyawan : </th>
            <th>Tanggal : </th>
            <th>Jam masuk : </th>
            <th>Jam pulang : </th>
            <th>Keterangan : </th>
            <th>Ip address : </th>
            <th>Opsi : </th>
        </thead>
        
        <tbody>
            <?php $no = 1; foreach($data as $row): ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <?= $row['awalan'] .' '. $row['nama_depan'] .' '. $row['nama_tengah'] .' '. $row['nama_belakang'] .' '. $row['akhiran']; ?>
                </td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['masuk']; ?></td>
                <td><?= $row['pulang']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['ip_address']; ?></td>
                <td>
                    <a href="<?= base_url('detail_absen/').$row['id']; ?>" class="btn btn-block btn-success btn-sm">Detail</a>
                </td>
                
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