<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <br>
    
    <div class="panel panel-primary">
           
        <div class="panel-heading">
            <h3 class="panel-title">DETAIL ABSEN <?= strtoupper($data['username']); ?></h3>
        </div>

        <div class="panel-body">
            <div class="row">
                   
                <div class="col-xs-3">
                    <img src="<?= base_url('assets/photo/').$data['foto']; ?>" alt="" class="img-responsive img-circle">
                </div>
                    
                <div class="col-xs-9">
                    <div class="table-responsive">
                           
                        <table class="table table-striped">
                            <thead>
                                <th>Data : </th>
                                <th>Nilai : </th>
                            </thead>
                           
                            <tbody>
                                   
                                <tr>
                                    <td>Nama : </td>
                                    <td>
                                        <?= $data['awalan'] .' '. $data['nama_depan'] .' '. $data['nama_tengah'] .' '. $data['nama_belakang'] .' '. $data['akhiran']; ?>
                                    </td>
                                </tr>
                                   
                                <tr>
                                    <td>Tanggal absen : </td>
                                    <td><?= $data['tanggal']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>Jam absen masuk : </td>
                                    <td><?= $data['masuk']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>Jam absen pulang : </td>
                                    <td><?= $data['pulang']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>Keterangan : </td>
                                    <td><?= $data['keterangan']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>IP Address : </td>
                                    <td><?= $data['ip_address']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>Latitude Longitude absen masuk : </td>
                                    <td id="latlng_masuk"><?= $data['latlng_masuk']; ?></td>
                                </tr>
                                   
                                <tr>
                                    <td>Latitude Longitude absen pulang : </td>
                                    <td id="latlng_pulang"><?= $data['latlng_pulang']; ?></td>
                                </tr>
                                    
                            </tbody>
                        </table>
                            
                    </div>
                </div>
                    
            </div>
        </div>
           
        <div class="panel-footer text-right">
            <a href="" class="btn btn-sm btn-success" id="event" data-toggle="modal" data-toggle="modal" data-target="#lct_masuk">
                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                Tampilkan lokasi masuk
            </a>
            
            <?php if(!empty($data['latlng_pulang'])): ?>
            <a href="" class="btn btn-sm btn-warning" id="event2" data-toggle="modal" data-toggle="modal" data-target="#lct_masuk2">
                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                Tampilkan lokasi pulang
            <?php endif; ?>
            </a>
        </div>
            
    </div>
        
</div>

<div class="modal fade" id="lct_masuk" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal-label">LOKASI ABSEN MASUK</h4>
            </div>

            <div class="modal-body">
                <div id="map" style="height: 400px;"></div>
            </div>

            <div class="modal-footer" style="background-color: #f7f7f7;">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="lct_masuk2" tabindex="-1" role="dialog" aria-labelledby="modal-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #f7f7f7;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal-label">LOKASI ABSEN MASUK</h4>
            </div>

            <div class="modal-body">
                <div id="map2" style="height: 400px;"></div>
            </div>

            <div class="modal-footer" style="background-color: #f7f7f7;">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!--<div id="map2" style="height: 400px;"></div>-->

<script>
    function initMap(){
                
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: -34.397, lng: 150.644}
        });   
        
        var map2 = new google.maps.Map(document.getElementById('map2'), {
            zoom: 8,
            center: {lat: -34.397, lng: 150.644}
        });
                
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow;
                
        var geocoder2 = new google.maps.Geocoder();
        var infowindow2 = new google.maps.InfoWindow;

        document.getElementById('event').addEventListener('click', function() {
            geocodeAddress(geocoder, map, infowindow);
        });
        
        document.getElementById('event2').addEventListener('click', function() {
            geocodeAddress2(geocoder2, map2, infowindow2);
        });
    }

    function geocodeAddress(geocoder, resultsMap, infowindow){
                
        var location = document.getElementById('latlng_masuk').innerHTML;
        console.log(location);
        var latlngStr = location.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
                
        geocoder.geocode({'location': latlng}, function(results, status) {
                    
            if(status === 'OK'){
                resultsMap.setZoom(15);
                console.log(results[0].formatted_address);
                        
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                        
                $('#lct_masuk').on("shown.bs.modal", function(){
                    google.maps.event.trigger(resultsMap, "resize");
                    resultsMap.setCenter(results[0].geometry.location);
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(resultsMap, marker);
                });
                        
            }else{
                alert('Geocode was not successful for the following reason: ' + status);
            }
                    
        });
    }

    function geocodeAddress2(geocoder, resultsMap, infowindow){
                
        var location = document.getElementById('latlng_pulang').innerHTML;
        console.log(location);
        var latlngStr = location.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
                
        geocoder.geocode({'location': latlng}, function(results, status) {
                    
            if(status === 'OK'){
                resultsMap.setZoom(15);
                console.log(results[0].formatted_address);
                        
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                        
                $('#lct_masuk2').on("shown.bs.modal", function(){
                    google.maps.event.trigger(resultsMap, "resize");
                    resultsMap.setCenter(results[0].geometry.location);
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(resultsMap, marker);
                });
                        
            }else{
                alert('Geocode was not successful for the following reason: ' + status);
            }
                    
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6SkKZwiK9ynrGKvaYW1KiqZz1BA7FSGc&callback=initMap"></script>