$(document).ready(function() {

$.getJSON('http://datatank.stad.gent/4/onderwijsopvoeding/secundairescholen.json', function(secundairescholen){

    for (var i = 0; i < secundairescholen.length; i++) {
        $('#divSchool').append($('<div>', {text: secundairescholen[i].NAAM}));
    }
});
});



$(document).ready(function() {

$.getJSON('http://datatank.stad.gent/4/cultuursportvrijetijd/kunstenplan.json', function(kunstenplan){

    for (var i = 0; i < kunstenplan.length; i++) {
      $('#divKunst').append($('<div>', {text: kunstenplan[i].Naam}));
    }
});
});


$(document).ready(function() {

$.getJSON('http://datatank.stad.gent/4/toerisme/visitgentevents.json', function(visitgentevents){

    for (var i = 0; i < visitgentevents.length; i++) {
        $('#divEvent').append($('<div>', {text: visitgentevents[i].title}));
    }
});
});


$(document).ready(function() {

$.getJSON('http://datatank.stad.gent/4/toerisme/visitgentspots.json', function(visitgentspots){

    for (var i = 0; i < visitgentspots.length; i++) {
        $('#divSpots').append($('<div>', {text: visitgentspots[i].title}));
    }
});
});






$(document).ready(function() {
  var divButton = $('#divSchool');
  $(divButton).hide();

  $('#button-1').click(function(e) {
      $(divButton).toggle();
      e.preventDefault();
  });
});


$(document).ready(function() {
  var divButton2 = $('#divKunst');
  $(divButton2).hide();

  $('#button-2').click(function(e) {
      $(divButton2).toggle();
      e.preventDefault();
  });
});


$(document).ready(function() {
  var divButton3 = $('#divEvent');
  $(divButton3).hide();

  $('#button-3').click(function(e) {
      $(divButton3).toggle();
      e.preventDefault();
  });
});



$(document).ready(function() {
  var divButton4 = $('#divSpots');
  $(divButton4).hide();

  $('#button-4').click(function(e) {
      $(divButton4).toggle();
      e.preventDefault();
  });
});
