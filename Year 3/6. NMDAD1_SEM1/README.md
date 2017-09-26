# WeRead

## Synopsis

WeRead is a social reading app, designed to bring people together.

## Deployment

Copy this project (everything inside the "dotnet" folder) to your webdomain or hosting service (apache, ...). The API keys won't work locally. Once everything is uploaded, the site should work without problems.

## Project description

* css folder: contains bootstrap files and custom styles ('main.css' or Sass version 'main.scss')
* fonts folder: contains glyphicons (used for the navigation menu)
* img folder: contains pictures used as content on the "profile" pages
* js folder: contains firebase setup, clock (used in navigation menu), snowflakes (used only during holiday season), handlebars, search (which loads the YouTube Data V3), a file with all the people (in one JavaScript object) and the list of books available in the library in Ghent
* map folder: contains the HTML page with the map (this map contains the locations of all libraries in Ghent)
* messages folder: contains the HTML page with the (future) chat application and the firebase initialisation
* people folder: contains the HTML page which loads in all of the people in the JavaScript object
* profile folder:  contains all HTML pages for each profile
* search folder: contains the HTML page with the YouTube search feature
* settings folder: contains the HTML pages used in the settings menu; login (with facebook and google login), signup (registration form) and disclaimer (legal information about Arteveldehogeschool)
* tpl folder: contains HTML file used to show YouTube video's (the results of a user query) on the search page
* loose files: 404 page, icons (WeRead logo), index.html (the website homepage with a list of available books), robots.txt (for search engines) and humans.txt (info about the people behind this project)

## API Reference

Google Developer Console: Project WeRead (Firebase, YouTube, Google login)
Facebook For Developers: WeRead App (Facebook login)

## Contributors

For more information, contact the project developers:
  * Anthony De Rouck - anthdero@student.arteveldehs.be
  * Kevin Dossche - kevidoss@student.arteveldehs.be
