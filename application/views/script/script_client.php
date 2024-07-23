<script type="module">
    import Map from './templates/kamr/vendor/ol/Map.js';
    import View from './templates/kamr/vendor/ol/View.js';
    import TileLayer from './templates/kamr/vendor/ol/layer/Tile.js';
    import TileWMS from './templates/kamr/vendor/ol/source/TileWMS.js';
    import OSM from './templates/kamr/vendor/ol/source/OSM.js';
    import * as olProj from './templates/kamr/vendor/ol/proj.js';
    import Feature from './templates/kamr/vendor/ol/Feature.js';
    import * as olExtent from './templates/kamr/vendor/ol/extent.js';
    
    import {toStringHDMS} from './templates/kamr/vendor/ol/coordinate.js';

    const map = new Map({
        layers: [
            new TileLayer({
                source: new OSM()
            }),
        ],
        view: new View({
            // extent: olExtent.buffer(bulgariaExtent, 5000000),
            center: olProj.fromLonLat([116.23535146435336, -0.6564186555673117]),
            zoom: 5,
        }),
        target: 'map',
    });

    
</script>