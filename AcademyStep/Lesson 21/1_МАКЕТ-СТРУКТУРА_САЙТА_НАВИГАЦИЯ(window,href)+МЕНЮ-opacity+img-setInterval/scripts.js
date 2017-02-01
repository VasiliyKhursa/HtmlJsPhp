//win - глобальная-"маркер" окна
var win;
//win - глобальная-"маркер" окна
//opacity-menu+jquery
var elem_img=decodeURIComponent(location.search.substring(1))
var img_name=elem_img.substr(elem_img.indexOf("=")+1);
$(document).ready(function() {
var rimg=document.body.getElementsByTagName("img");
for(var i=0; i<rimg.length; i++) {
   if(rimg[i].getAttribute("name")==img_name) {
      rimg[i].style.opacity=0.5;
   }
}
});
//opacity-menu+jquery
//plugin-widthUp-image1
var int;
var s;
var j;
function widthUp(elem, interv) {
     j=document.getElementById(elem).offsetWidth;
     int=setInterval('widthUp_style("'+elem+'")', interv);
}
function widthUp_style(elem_st) {
     j=j+60;
     var r_e=document.getElementById(elem_st);
     s=r_e.getAttribute('style');
     if(s) {
       if(s.indexOf('width')!=-1) {
          var r=/width *: *\d+/;
          var s_r=s.replace(r, 'width:'+j);
          r_e.setAttribute('style', s_r);
       }
       else {
       r_e.setAttribute('style', s+'width:'+j+'px;');
       }
     }
     else {
     r_e.setAttribute('style', 'width:'+j+'px;');
     }
     if(j>=1024) {
       r_e.setAttribute('style', 'width:1024px;');
       clearInterval(int);
       setTimeout("document.images['body_img'].src=body_img_mas[1]; document.images['body_img'].style.opacity=0.0; int=setInterval('func_opac()', 50);", 2000);
       //jq-fideOut-fideIn
       ////////////////////////////////
       //setTimeout("document.images['body_img'].src=body_img_mas[1];", 2000); 
      //setTimeout("document.images['body_img'].src=body_img_mas[1]; $('#body_img_id').fadeOut(10); $('#body_img_id').fadeIn(2500);", 2000);
       ////////////////////////////////
       //jq-fideOut-fideIn
     }
}
//plugin-widthUp-image1
//setInterval-opacity-image2
var op=0.0;
function func_opac() {
   op+=0.02;
   document.images["body_img"].style.opacity=op;
   if(op>=1.0) {
      document.images["body_img"].style.opacity=1.0;
      clearInterval(int);
      i=1;
      document.images["body_go"].style.visibility="visible";
   }
}
//setInterval-opacity-image2