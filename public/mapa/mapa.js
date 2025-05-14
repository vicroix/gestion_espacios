function inicializarMapa() {
    mapboxgl.accessToken = "pk.eyJ1IjoicGFwYWZyaXRhODgiLCJhIjoiY204eWM0eDFuMGF2dzJxc2dmZTBsYXB6cCJ9.wQb_QXDpZ7isAWBnoi14FQ";
    const apiKey = "zqVfiojTFXFJtmVndyEOu8luVqE7LQqWskiQt_ysWDM";

    const contenedorMapa = document.getElementById("contenedor-del-mapa");
    const contenedorLocalidad = document.getElementById("inputLocalidad");
    const contenedorCP = document.getElementById("inputCP");

    if (!contenedorMapa || !contenedorLocalidad || !contenedorCP) return;

    const direccion = contenedorMapa.dataset.direccion;
    const cp = contenedorCP.dataset.cp;
    const localidad = contenedorLocalidad.dataset.localidad;
    const direccionCompleta = `${direccion}, ${cp}, ${localidad}`;

    fetch(`https://geocode.search.hereapi.com/v1/geocode?q=${direccionCompleta}&apiKey=${apiKey}`)
        .then((response) => response.json())
        .then((data) => {
            const latitud = data.items[0].position.lat;
            const longitud = data.items[0].position.lng;

            const mapa = new mapboxgl.Map({
                container: "contenedor-del-mapa",
                style: "mapbox://styles/mapbox/streets-v12",
                center: [longitud, latitud],
                zoom: 15,
            });

            setTimeout(() => {
                mapa.resize();
            }, 300);

            const popup = new mapboxgl.Popup({}).setText(direccionCompleta);

            new mapboxgl.Marker({
                color: "#990000",
                rotation: 0,
            })
                .setLngLat([longitud, latitud])
                .setPopup(popup)
                .addTo(mapa);
        });
}
