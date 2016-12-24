/**
 * Created by root on 12/24/16.
 */
$(document).ready(function () {
   var Gmail={
       $compose:$("#compose"),
       $compose_window:$("#compose_window"),
       $email:$("#email"),
       $subject:$("#subject"),
       $email_body:$("#email_body"),
       currentMailID:null,
       init:function () {
           var self=this;
           self.$compose.click(function () {
               self.$compose_window.show(100);
               $.ajax({
                   method: "POST",
                   url: "email/new"
               })
                   .done(function( id ) {
                       self.currentMailID=id;
                   });
           });
       },
       sendMail:function () {
           $.ajax({
               method: "POST",
               url: "",
               data: { name: "John", location: "Boston" }
           })
               .done(function( msg ) {
                   alert( "Data Saved: " + msg );
               });
       },
       saveToDraft:function (el) {
           var self=this;
           $(el).parents().hide(100);
           $.ajax({
               method: "POST",
               url: "",
               data: { id: self.currentMailID, ema: "Boston" }
           })
               .done(function( msg ) {
                   alert( "Data Saved: " + msg );
               });

       }

   };
   Gmail.init();
});