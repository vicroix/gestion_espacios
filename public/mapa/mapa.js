mapboxgl.accessToken = "pk.eyJ1IjoicGFwYWZyaXRhODgiLCJhIjoiY204eWM0eDFuMGF2dzJxc2dmZTBsYXB6cCJ9.wQb_QXDpZ7isAWBnoi14FQ"
const apiKey = "zqVfiojTFXFJtmVndyEOu8luVqE7LQqWskiQt_ysWDM"
//La dirección que se inserta a continuación es la que se muestra <--ENLAZAR AQUI CON LA BBDD
const direccion = "P.º de Cristóbal Colón, 22, Casco Antiguo, 41001 Sevilla"

fetch(`https://geocode.search.hereapi.com/v1/geocode?q=${direccion}&apiKey=${apiKey}`)
    .then((response) => response.json())
    .then((data) => {
        latitud = data.items[0].position.lat
        longitud = data.items[0].position.lng

        const mapa = new mapboxgl.Map({
            container: "contenedor-del-mapa",
            //Estilo del mapa, se puede poner vista satélite o vista mapa
            style: "mapbox://styles/mapbox/streets-v12",
            //Centro de visualización del mapa al abrir app [Longitud, Latitud]
            center: [longitud, latitud],
            //Zoom aplicado al abrir la app
            zoom: 15
        })

        //Popup con mensaje que aparece en la aplicación indicando la dirección exacta
        const popup = new mapboxgl.Popup({

        }).setText(direccion)

        //Clase para añadir marcador
        const marcador = new mapboxgl.Marker({
            //Define el color del marcador
            color: "#990000",
            //Define el angulo del marcador
            rotation: 0
        }).setLngLat([longitud, latitud]).setPopup(popup).addTo(mapa)

        //Función click que muestra los datos donde se hace click
        function clickSobreMapa(evento){
            alert(evento.lngLat)
        }

        mapa.on("click", clickSobreMapa)

    })

fetch(`https://revgeocode.search.hereapi.com/v1/revgeocode?at=${coordenadasLatitud},${coordenadasLongitud}&apiKey=${apiKey}`)
    .then((response) => response.json())
    .then((data) => {
        console.log(data)
    })
