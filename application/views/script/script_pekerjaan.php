<?php 
$uri = $this->uri->segment('3');
$maps = json_encode(get_maps_pekerjaan($uri));
    // print_r($maps);die;
if(get_maps_pekerjaan($uri)[0] != ""):
?>

<script type="module">
    import Map from './../../templates/kamr/vendor/ol/Map.js';
    import View from './../../templates/kamr/vendor/ol/View.js';
    import TileLayer from './../../templates/kamr/vendor/ol/layer/Tile.js';
    import TileWMS from './../../templates/kamr/vendor/ol/source/TileWMS.js';
    import OSM from './../../templates/kamr/vendor/ol/source/OSM.js';
    import Overlay from './../../templates/kamr/vendor/ol/Overlay.js';
    import * as olProj from './../../templates/kamr/vendor/ol/proj.js';
    import Feature from './../../templates/kamr/vendor/ol/Feature.js';
    import * as olExtent from './../../templates/kamr/vendor/ol/extent.js';

    import {
        toStringHDMS
    } from './../../templates/kamr/vendor/ol/coordinate.js';
    

    var places = <?= $maps ?>;
    var lamarin = ol.proj.fromLonLat([places[0], places[1]]);

    var view = new ol.View({
        center: lamarin,
        zoom: 12 // 5
    });

    var vectorSource = new ol.source.Vector({});

    var features = [];
    
    var iconFeature = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.transform([places[0], places[1]], 'EPSG:4326', 'EPSG:3857')),
        lon: places[0],
        lat: places[1],
        name: places[2],
        lokasi: places[3],
        pagu: places[4],
        link: places[5]
    });

    var iconStyle = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            anchorXUnits: 'fraction',
            anchorYUnits: 'fraction',
            src: '<?= base_url() ?>images/map-marker.png',
            crossOrigin: 'anonymous',
        })
    });
    iconFeature.setStyle(iconStyle);
    vectorSource.addFeature(iconFeature);


    var vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        updateWhileAnimating: true,
        updateWhileInteracting: true,
    });

    var map = new ol.Map({
        target: 'map',
        view: view,
        layers: [
            new ol.layer.Tile({
                preload: 3,
                source: new ol.source.OSM(),
            }),
            vectorLayer,
        ],
        loadTilesWhileAnimating: true,
    });

    var element = document.getElementById('popup');

    var popup = new Overlay({
        element: element,
        positioning: 'bottom-center',
        stopEvent: false,
    });
    map.addOverlay(popup);

    let popover;

    function disposePopover() {
        if (popover) {
            popover.dispose();
            popover = undefined;
        }
    }
    // display popup on click
    map.on('click', function(evt) {
        var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
            return feature;
        });
        disposePopover();
        if (!feature) {
            return;
        }
        popup.setPosition(evt.coordinate);


        var text = "<a class='h4' href='" + feature.get('link') + "'>" + feature.get('name') + "</a>" +
            "<div class='row mt-3'>" +
            "<div class='col-md-5 col-5'>Titik Kordinat</div>" +
            "<div class='col-md-1 col-1 p-0 text-center'> : </div>" +
            "<div class='col-md-6 col-12'>" + feature.get('lon') + ", " + feature.get('lat') + "</div>" +
            "</div>" +
            "<div class='row mt-3'>" +
            "<div class='col-md-5 col-5'>Kecamatan</div>" +
            "<div class='col-md-1 col-1 p-0 text-center'> : </div>" +
            "<div class='col-md-6 col-12'>" + feature.get('lokasi') + "</div>" +
            "</div>" +
            "<div class='row mt-3'>" +
            "<div class='col-md-5 col-5'>Pagu</div>" +
            "<div class='col-md-1 col-1 p-0 text-center'> : </div>" +
            "<div class='col-md-6 col-12 fw-bolder'>" + feature.get('pagu') + "</div>" +
            "</div>";



        popover = new bootstrap.Popover(element, {
            placement: 'top',
            animation: false,
            stopEvent: true,
            html: true,
            content: text,
        });
        popover.show();
    });

    // Close the popup when the map is moved
    map.on('movestart', disposePopover);
</script>
<?php else: ?>

<script type="module">
    import Map from './../../templates/kamr/vendor/ol/Map.js';
    import View from './../../templates/kamr/vendor/ol/View.js';
    import TileLayer from './../../templates/kamr/vendor/ol/layer/Tile.js';
    import OSM from './../../templates/kamr/vendor/ol/source/OSM.js';
    
    var lamarin = ol.proj.fromLonLat([107.01119550571731, -6.273656897907412]);
    
    const map = new Map({
        layers: [
            new TileLayer({
            source: new OSM(),
            }),
        ],
        target: 'map',
        view: new View({
            center: lamarin,
            zoom: 12,
        }),
    });

</script>

<?php endif; ?>