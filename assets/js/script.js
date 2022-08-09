const defaultLocation = [29.6026877,52.5506621];
const defaultZoom = 15
var map = L.map('map').setView(defaultLocation, defaultZoom);

var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map; <a href="http://localhost/Map">Map Project</a>'
}).addTo(map);
document.getElementById('map').style.setProperty('height' , window.innerHeight + 'px');

/**** Add location with dblClick ******/
map.on('dblclick' , function (event)
{
   // Add Marker With dblclick
   L.marker(event.latlng).addTo(map);
   //Show Modal
    $('.modal-overlay').fadeIn(500);
   // Namayesh Mokhtasat
    $('#lat-display').val(event.latlng.lat);
    $('#lng-display').val(event.latlng.lng);
    $('#l-title').val('');
    $('#l-type').val(0);
});


$(document).ready(function ()
{
   // send info with ajax
    $('form#addLocationForm').submit(function (e)
    {
        e.preventDefault();
        var form = $(this);
        var ajaxResult = form.find('.ajax-result');
        $.ajax({
            url : form.attr('action'),
            method : form.attr('method'),
            data : form.serialize(),
            success : function (response)
            {
                alert(response);
                $('.modal-overlay').fadeOut(500);
            }
        });
    });

    // close modal
    $('.modal-overlay .close').click(function (){
        $('.modal-overlay').fadeOut();
    });

})
map.addControl(new L.Control.Gps())