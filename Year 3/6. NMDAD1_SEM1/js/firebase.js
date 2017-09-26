  /*
  *Initialize Firebase
  */
  var config = {
    apiKey: "AIzaSyD-7_QNL-w2m2JAF44AUBwQpFKoFN5PWSA",
    authDomain: "weread-152414.firebaseapp.com",
    databaseURL: "https://weread-152414.firebaseio.com",
    storageBucket: "weread-152414.appspot.com",
    messagingSenderId: "877965125756"
  };
  firebase.initializeApp(config);

/*
*ask for the permission to send notifications to the user 
*/
const messaging = firebase.messaging();
messaging.requestPermission()
.then(function() {
  $("#firebase").html("Firebase Initialized");
  return messaging.getToken();
})
.then(function(token) {
  console.log(token);
})
.catch(function(err) {
  console.log('Error occured');
})

messaging.onMessage(function(payload) {
  console.log('onMessage ', payload);
});
