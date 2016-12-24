/**
 * Created by root on 12/24/16.
 */

   var Gmail={
       $compose:$("#compose"),
       $compose_window:$("#compose_window"),
       $email:$("#email"),
       $subject:$("#subject"),
       $email_body:$("#email_body"),
       $panel_group:$('#panel-group'),
       currentMailID:null,
       init:function () {
           var self=this;
           self.getEmails();
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
           var self=this;
           $.ajax({
               method: "GET",
               url: "/inbox"
           })
               .done(function( response ) {
                   console.log(response);
                   //self.fillInbox(response.inbox);
               });
       },
        fillInbox:function (data) {
            for(var i=0;i<data.length;i++){
                data[i].username="Rahul";
             this.$panel_group.append('<div class="panel panel-default"> ' +
                 '<div class="panel-heading"> ' +
                 '<h4 class="panel-title">' +
                 '<a data-toggle="collapse" href="#collapse1"> ' +
                 '<span class="name" style="min-width: 120px;display: inline-block;">'+data[i].username+'</span> ' +
                 '<span class="">'+data[i].subject+'</span> ' +
                 '<span class="badge">12:10 AM</span> ' +
                 '</a> ' +
                 '</h4>'+
                 '</div> ' +
                 '<div id="collapse1" class=" collapse"> ' +
                 '<div class="panel-body">'+data[i].body+'</div> ' +
                 '</div> ' +
                 '</div>');
            }
        },
       sendMail:function () {
           var self=this;
           var receivers=self.$email.val().split(',');
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