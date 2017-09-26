# WeRead

## Synopsis

WeRead is a social reading app, designed to bring people together.

## Deployment

Copy this project (everything inside the "dotnet" folder) to your webdomain or hosting service (apache, ...). The API keys won't work locally. Once everything is uploaded, the site should work without problems.

## Project description

* css folder: contains bootstrap files and custom styles ('main.css' or Sass version 'main.scss')
* fonts folder: contains glyphicons (used for the navigation menu)
* img folder: contains pictures used as content on the "profile" pages
* js folder: contains clock (used in navigation menu), google login file, a file to redirect automatically to the correct profile based on which link you click, jquery,  handlebars, search (which loads the YouTube Data V3), a file with all the people (in one JavaScript object), the SendBird library for the chat application and the list of books available in the library in Ghent
* pages folder: contains the HTML pages (all content of the website)
* includes folder: contains the templates for footer, header, navigation and chat application
* assets folder: contains files used to show YouTube video's (the results of a user query) on the search page
* loose files: 404 page, icons (WeRead logo), index.html (the website homepage), robots.txt (for search engines) and humans.txt (info about the people behind this project)

## API Reference

Google Developer Console: Project WeRead (YouTube, Google login)
Facebook For Developers: WeRead App (Facebook login)

## Contributors

For more information, contact the project developers:
  * Anthony De Rouck - anthdero@student.arteveldehs.be
  * Kevin Dossche - kevidoss@student.arteveldehs.be
