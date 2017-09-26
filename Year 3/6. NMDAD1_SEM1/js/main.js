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
*Homepage load dataset and show only the books
*/

$(document).ready(function() {

$.getJSON('https://datatank.stad.gent/4/cultuursportvrijetijd/bibliotheekopenbeschrijving.json', function(books){


    for (var i = 0; i < books.length; i++) {
      if (books[i].type == "Boek"){
        $('#books').append($('<p>', {text: books[i].title}));
}
    }
});
});


/*
*Search list of books and mark 'your favourite'
*/
$(document).ready(function() {
  $("form").submit(function(e){
       $("#books").show(); //laat boeken zien
       query = $("#search").val();
       hiliter(query, "highlight");
       e.preventDefault(); //verhinder dat form wordt ingediend
  });
});

/*
*Give a class to user input in search bar (for highlighting the input) 
*/
function hiliter(query, className) {
    var regex = new RegExp("\\b"+query+"\\b", "gi");
    $("#books")[0].innerHTML = $("#books")[0].innerHTML.replace(regex, function(matched) {return "<span class=\"" + className + "\">" + matched + "</span>";});

};
