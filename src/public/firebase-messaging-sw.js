importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyDEDpvikpUuySB-fn4sEsKU2BumgIYQuec",
    projectId: "monitoring-kolam-6febd",
    messagingSenderId: "121423439938",
    appId: "1:121423439938:web:3338eadf43862190f225db"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});