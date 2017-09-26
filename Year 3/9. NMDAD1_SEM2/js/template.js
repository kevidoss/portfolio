var source   = document.querySelector("#users-template").innerHTML;
var template = Handlebars.compile(source);


document.querySelector('.container').innerHTML = template(persons);
