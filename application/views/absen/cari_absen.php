<br>
<div class="row">
    <div class="col-md-6">
        <form action="<?php echo base_url('search/between'); ?>" method="get" class="form-inline">
            <div class="form-group">
               
                <div class="input-group">
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </span>
                    <input type="date" name="date" class="form-control">
                    
                </div>
               
               <span> &#126; </span>
               
                <div class="input-group">
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </span>
                    <input type="date" name="date2" class="form-control">
                    
                </div>
                
            </div>
                        
            <input type="submit" name="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
                
    <div class="col-md-6 text-right">
        <?php if($this->session->userdata('user_jabatan') == 'admin'): ?>
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
        </thead>

        <tbody>
            <?php $no = 1; foreach($data as $row): ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['masuk']; ?></td>
                <td><?= $row['pulang']; ?></td>
                <td><?= $row['keterangan']; ?></td>
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