<script>
    // Peta Dasar Koordinat tengah KKKU [-1.1505796, 109.5429503]
    var mymap = L.map('mapid').setView([0.2811534, 114.1656873], 9);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 6,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    }).addTo(mymap);
    // End Peta Dasar

    // Style Polygon
    // var myStyle = {
    //     "color": "#ff7800",
    //     "weight": 1,
    //     "opacity": 0.4
    // };

    // Pop Up / Informasi yang muncul saat diklik
    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            // for (key in f.properties) {
            //     console.log(key);
            //     out.push(key + ": " + f.properties[key]);
            // }
            out.push("Pulau: " + f.properties['PULAU']);
            out.push("Provinsi: " + f.properties['PROVINSI']);
            l.bindPopup(out.join("<br />"));
        }
    }

    // Memanggil GeoJSON
    <?php foreach ($kecamatan as $kcm) : ?>
        var myStyle<?= $kcm['id'] ?> = {
            "color": "<?= $kcm['warna'] ?>",
            "weight": 1,
            "opacity": 0.4
        };

        var jsonTest = new L.GeoJSON.AJAX(["<?= base_url() ?>assets/geojson/<?= $kcm['geojson'] ?>"], {
            onEachFeature: popUp,
            style: myStyle<?= $kcm['id'] ?>
        }).addTo(mymap);
    <?php endforeach; ?>
</script>