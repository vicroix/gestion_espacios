// Mapa interactivo MAPBOX
mapboxgl.accessToken =
  "pk.eyJ1IjoicGFwYWZyaXRhODgiLCJhIjoiY204eWM0eDFuMGF2dzJxc2dmZTBsYXB6cCJ9.wQb_QXDpZ7isAWBnoi14FQ";

const geojson = {
  type: "FeatureCollection",
  features: [
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: [-5.986877284246261, 37.37712091007239],
      },
      properties: {
        title: "TeatroGest",
        description: "Ubicación de TeatroGest",
      },
    },
  ],
};

const map = new mapboxgl.Map({
  container: "map",
  style: "mapbox://styles/mapbox/light-v11",
  center: [-5.986877284246261, 37.37712091007239],
  zoom: 15,
});

// add markers to map
for (const feature of geojson.features) {
  // code from step 7-1 will go here
  // create a HTML element for each feature
  const el = document.createElement("div");
  el.className = "marker";
  // make a marker for each feature and add to the map
  new mapboxgl.Marker().setLngLat(feature.geometry.coordinates).addTo(map); // Replace this line with code from step 7-2
  new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
}
