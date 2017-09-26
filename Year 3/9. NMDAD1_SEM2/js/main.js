/*
*Responsive size adjustment
*/

function htmlbodyHeightUpdate(){
var height3 = $( window ).height()
var height1 = $('.nav').height()+50
height2 = $('.main').height()
if(height2 > height3){
  $('html').height(Math.max(height1,height3,height2)+10);
  $('body').height(Math.max(height1,height3,height2)+10);
}
else
{
  $('html').height(Math.max(height1,height3,height2));
  $('body').height(Math.max(height1,height3,height2));
}

}
$(document).ready(function () {
htmlbodyHeightUpdate()
$( window ).resize(function() {
  htmlbodyHeightUpdate()
});
$( window ).scroll(function() {
  height2 = $('.main').height()
    htmlbodyHeightUpdate()
});
});


/*
*books load dataset and show only the books
*/

$(document).ready(function() {

$.getJSON('https://datatank.stad.gent/4/cultuursportvrijetijd/bibliotheekopenbeschrijving.json', function(books){


    for (var i = 0; i < books.length; i++) {
      if (books[i].type == "Boek"){
        $contentToAppend = $('<p>', {text: books[i].title},  '</p>');
        $('#books').append($contentToAppend);
        $contentToAppend.addClass("boektitel");
}
    }
});
});
