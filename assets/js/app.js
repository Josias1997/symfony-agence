import Places from 'places.js';
const $ = require('jquery');
require('select2');

let inputAddress = document.querySelector('#property_address');

if (inputAddress !== null) {
    let place = Places({
        container: inputAddress
    })

    place.on('change', e => {
        document.querySelector('#property_city').value = e.suggestion.city;
        document.querySelector('#property_postal_code').value = e.suggestion.postcode;
        document.querySelector('#property_latitude').value = e.suggestion.latlng.lat;
        document.querySelector('#property_longitude').value = e.suggestion.latlng.lng;
    })
}
Places({
    container: document.querySelector('#property_address')
})
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.

$('select').select2();

$contactButton = $('#contact-button');

$contactButton.click(e => {
    e.preventDefault();
    $('#contact-form').slideDown();
    $contactButton.slideUp();
});

