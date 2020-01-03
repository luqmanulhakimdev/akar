<div class="col-md-9 col-lg-10">
    <div class="col-xs-10 col-sm-6 col-md-6 col-lg-5 center-block" style="float: none;">
        <?php echo form_open('absen'); ?>

            <h1 class="text-center">Absen Masuk</h1><br>
            <h3 id="time">Jam : <?= mdate('%H:%i:%s'); ?></h3>
            <h3>Tanggal : <?= mdate('%Y-%m-%d'); ?></h3>
            <br>
            <input type="hidden" name="ip_address" value="<?php echo $this->input->ip_address(); ?>">
            <input type="hidden" name="latlng" id="latlng">
            <label for="keterangan">Keterangan : </label>
            <textarea name="keterangan" class="form-control" id="keterangan"></textarea><br>
            <?= form_error('keterangan'); ?>

            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Absen">
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    var latlng = document.getElementById("latlng");

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

    function showPosition(position) {
        latlng.value = position.coords.latitude +','+ position.coords.longitude;
    }
</script>