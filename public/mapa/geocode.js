//API GEOCODE
const apiKey = "zqVfiojTFXFJtmVndyEOu8luVqE7LQqWskiQt_ysWDM"

fetch(`https://geocode.search.hereapi.com/v1/geocode?q=${direccion}&apiKey=${apiKey}`)
    .then((response) => response.json())
    .then((data) => {
        console.log(data.items[0].position)
    })
