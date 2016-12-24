/**
 * Created by root on 12/24/16.
 */

   var Gmail={
       $compose:$("#compose"),
       $compose_window:$("#compose_window"),
       $email:$("#email"),
       $subject:$("#subject"),
       $email_body:$("#email_body"),
       currentMailID:null,
       init:function () {
           var self=this;
           //self.getEmails();
           self.$compose.click(function () {
               self.$compose_window.show(100);
               $.ajax({
                   method: "POST",
                   url: "email/new"
               })
                   .done(function( response ) {
                       self.currentMailID=response.id;
                       alert(self.currentMailID);
                   });
           });
       },
       getEmails:function () {
           $.ajax({
               method: "POST",
               url: "email/all"
           })
               .done(function( response ) {
                   self.currentMailID=response.id;
                   alert(self.currentMailID);
               });
       },
       sendMail:function () {
           var self=this;
           var receivers=self.$email.val();
           alert(receivers);
           return;
           $.ajax({
               method: "PUT",
               url: "/email/"+self.currentMailID,
               data: { subject: self.$subject.val(), body: self.$email_body.val(),attachments:"",receivers:receivers}
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
               data: { id: self.currentMailID, email: self.$email.val(),subject:self.$subject.val(),mail_body:self.$email_body }
           })
               .done(function( msg ) {
                   alert( "Data Saved: " + msg );
               });

       }

   };
   Gmail.init();