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

// geo Location api
var current_position , current_accuracy
map.on('locationfound',function (e)
{
    if (current_position)
    {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy/3;
    current_position = L.marker(e.latlng).addTo(map).bindPopup("فاصله تقریبی تا مکان شما :"+ radius + "متر").openPopup();
    current_accuracy = L.circle(e.latlng , radius).addTo(map);
});
map.on('locationerror' , function (e){
    alert(e.message);
})

function locate()
{
    map.locate({setView : true , maxZoom: 17});
}
