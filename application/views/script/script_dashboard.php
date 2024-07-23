<!-- <script src="<?= base_url() ?>templates/kamr/js/dashboard/dashboard-1.js"></script> -->
<script src="<?= base_url() ?>templates/kamr/vendor/apexchart/apexchart.js"></script>
<script src="<?= base_url() ?>templates/kamr/vendor/peity/jquery.peity.min.js"></script>
<script src="<?= base_url() ?>templates/kamr/vendor/chart.js/Chart.bundle.min.js"></script>

<?php 
$maps = json_encode(get_maps_detail());
?>


<script>
    var pieChart1 = function() {
        var options = {
            series: [66, 129, 20],
            chart: {
                type: 'donut',
                height: 250,
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0,
            },
            // colors: ['var(--primary)', 'var(--primary-dark)', 'var(--secondary)'],
            legend: {
                position: 'bottom',
                show: false
            },
            responsive: [{
                    breakpoint: 1601,
                    options: {
                        chart: {
                            height: 200,
                        },
                    }
                },
                {
                    breakpoint: 1024,
                    options: {
                        chart: {
                            height: 200,
                        },
                    }
                }
            ]
        }

        var chart = new ApexCharts(document.querySelector("#pieChart1"), options);
        chart.render();
    };


    /* Function ============ */
	pieChart1();
</script>

<script type="module">
    import Map from './templates/kamr/vendor/ol/Map.js';
    import View from './templates/kamr/vendor/ol/View.js';
    import TileLayer from './templates/kamr/vendor/ol/layer/Tile.js';
    import TileWMS from './templates/kamr/vendor/ol/source/TileWMS.js';
    import OSM from './templates/kamr/vendor/ol/source/OSM.js';
    import Overlay from './templates/kamr/vendor/ol/Overlay.js';
    import * as olProj from './templates/kamr/vendor/ol/proj.js';
    import Feature from './templates/kamr/vendor/ol/Feature.js';
    import * as olExtent from './templates/kamr/vendor/ol/extent.js';

    import {
        toStringHDMS
    } from './templates/kamr/vendor/ol/coordinate.js';

    // const map = new Map({
    //     layers: [
    //         new TileLayer({
    //             source: new OSM()
    //         }),
    //     ],
    //     view: new View({
    //         // extent: olExtent.buffer(bulgariaExtent, 5000000),
    //         center: olProj.fromLonLat([106.992416, -6.241586]),
    //         zoom: 12,
    //     }),
    //     target: 'map',
    // });


    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');

    var lamarin = ol.proj.fromLonLat([107.01119550571731, -6.273656897907412]);

    var view = new ol.View({
        center: lamarin,
        zoom: 12 // 5
    });

    var vectorSource = new ol.source.Vector({});
    var places = <?= $maps ?>;

    var features = [];
    for (var i = 0; i < places.length; i++) {
        var iconFeature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.transform([places[i][0], places[i][1]], 'EPSG:4326', 'EPSG:3857')),
            lon: places[i][0],
            lat: places[i][1],
            name: places[i][2],
            lokasi: places[i][3],
            pagu: places[i][4],
            link: places[i][5]
        });


        /* from https://openlayers.org/en/latest/examples/icon-color.html
          rome.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
             color: '#8959A8',
             crossOrigin: 'anonymous',
             src: 'https://openlayers.org/en/v4.6.5/examples/data/dot.png'
            }))
          })); */

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
    }



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