/**
 * Created by root on 12/24/16.
 */
$(document).ready(function () {
   var Gmail={
       $compose:$("#compose"),
       $compose_window:$("#compose_window"),
       init:function () {
           var self=this;
           self.$compose.click(function () {
               self.$compose_window.show(100);
           });
       }

   };
   Gmail.init();
});