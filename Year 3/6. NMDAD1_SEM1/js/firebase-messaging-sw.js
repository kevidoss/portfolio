importScripts('https://www.gstatic.com/firebasejs/3.6.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.6.1/firebase-messaging.js');

// Initialize Firebase
var config = {
  apiKey: "AIzaSyD-7_QNL-w2m2JAF44AUBwQpFKoFN5PWSA",
  authDomain: "weread-152414.firebaseapp.com",
  databaseURL: "https://weread-152414.firebaseio.com",
  storageBucket: "weread-152414.appspot.com",
  messagingSenderId: "877965125756"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
