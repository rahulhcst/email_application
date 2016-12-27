/**
 * Created by root on 12/24/16.
 */

   var Gmail={
       $compose:$("#compose"),
       $compose_window:$("#compose_window"),
       $email:$("#email"),
       $subject:$("#subject"),
       $email_body:$("#email_body"),
       $panel_group_inbox:$('#panel-group-inbox'),
       $panel_group_sent:$('#panel-group-sent'),
       $mail_type:$("#mail_type"),
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
                       //alert(self.currentMailID);
                   });
           });
           $('#inbox').click(function (ev) {
               $(this).addClass('active');
               $(this).siblings().removeClass('active');
               self.$panel_group_inbox.show();
               self.$panel_group_sent.hide();
           });
           $('#sent_mail').click(function (ev) {
               self.$panel_group_sent.empty();
               $(this).addClass('active');
               $(this).siblings().removeClass('active');
               $.ajax({
                   method: "GET",
                   url: "/sent_mails"
               })
                   .done(function( response ) {
                       self.fillsentMails(response);
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
                   self.fillInbox(response);
               });
       },
        fillInbox:function (data) {
           var self=this;
           var emailLength=data.length;
            self.$mail_type.find("#inbox span").text(emailLength);
            for(var i=0;i<emailLength;i++){
                //data[i].body=data[i].body.replace(/↵/g, "<br/>");
             self.$panel_group_inbox.append('<div class="panel panel-default"> ' +
                 '<div class="panel-heading"> ' +
                 '<h4 class="panel-title">' +
                 '<a data-toggle="collapse" href="#mail'+data[i].thread.id+'"> ' +
                 '<span class="name" style="min-width: 120px;display: inline-block;">'+data[i].thread.id+'</span> ' +
                 '<span class="">'+data[i].thread.subject+'</span> ' +
                 '<span class="badge pull-right">'+data[i].thread.updated_at+'</span> ' +
                 '</a> ' +
                 '</h4>'+
                 '</div> ' +
                 '<div id="mail'+data[i].thread.id+'" class=" collapse"> ' +
                 '<div class="panel-body">'+data[i]+'</div> ' +
                 '</div> ' +
                 '</div>');
            }
        },
    fillsentMails:function (data) {
        var self=this;
        self.$panel_group_inbox.hide();
        self.$panel_group_sent.show();
        for(var i=0;i<data.length;i++){
            //data[i].body=data[i].body.replace(/↵/g, "<br/>");
            self.$panel_group_sent.append('<div class="panel panel-default"> ' +
                '<div class="panel-heading"> ' +
                '<h4 class="panel-title">' +
                '<a data-toggle="collapse" href="#mail'+data[i].id+'"> ' +
                '<span class="name" style="min-width: 120px;display: inline-block;">'+data[i].name+'</span> ' +
                '<span class="">'+data[i].subject+'</span> ' +
                '<span class="badge pull-right">'+data[i].time.date+'</span> ' +
                '</a> ' +
                '</h4>'+
                '</div> ' +
                '<div id="mail'+data[i].id+'" class=" collapse"> ' +
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
                   self.$compose_window.hide();
               });
       },
       saveToDraft:function (el) {
           var self=this;
           $(el).parents(self.$compose_window).hide(100);
           $.ajax({
               method: "POST",
               url: "",
               data: { id: self.currentMailID, email: self.$email.val(),subject:self.$subject.val(),mail_body:self.$email_body }
           })
               .done(function( msg ) {
                   alert( "Saved to Drafts " + msg );
                   self.$compose_window.hide();
               });

       }

   };
   Gmail.init();