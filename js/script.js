jQuery( document ).ready( function( $ ) {  

/* parallax header */

var parallaxImage = document.getElementById('masthead');
var parallaxContent = document.getElementById('ParallaxContent');
var windowScrolled;

window.addEventListener('scroll', function windowScroll() {
  windowScrolled = window.pageYOffset || document.documentElement.scrollTop;
  parallaxImage.style.transform = 'translate3d(0, ' + windowScrolled / 4 + 'px, 0)';
  parallaxContent.style.transform = 'translate3d(0, ' + windowScrolled / 6 + 'px, 0)';
});



var $toggles = $('.menu__icon');
var $toggleLink = $('.link');

$toggles.on('click', function () {
    $(this).closest('.menu').toggleClass('open');
});

$toggleLink.on('click', function () {
    $(this).closest('.menu').toggleClass('open');

});
         
        
         
function createStars(i) {
  for (var i; i; i--) {
    drawStars();
  }
}

function drawStars(){
  var tmpStar = document.createElement('figure');
  tmpStar.className = "star";
  tmpStar.style.top = 100*Math.random()+'%';
  tmpStar.style.left = 100*Math.random()+'%';
  document.getElementById('site-navigation').appendChild(tmpStar);
}





function animateStars() {
      stars = document.querySelectorAll(".star");
      Array.prototype.forEach.call(stars, function(el, i){
      TweenMax.to(el, Math.random() * 0.5 + 0.5, {opacity: Math.random(), onComplete: animateStars});
    });
}


    createStars(50);
    animateStars(); 
         
   
         
// scroll reveal on homepage         
window.sr = ScrollReveal();
sr.reveal('.reveal', { delay: 0.2, scale: 0.98, duration: 1000 });         
         
         

jQuery( document ).ready( function( $ ) {  
  $('.filter a').click(function(e) {
    e.preventDefault();
    var a = $(this).attr('href');
    a = a.substr(1);
    $('.sets a').each(function() {
      if (!$(this).hasClass(a) && a !== 'all')
        $(this).addClass('hide');
      else
        $(this).removeClass('hide');
    });

  });

  $('.sets a').click(function(e) {
    e.preventDefault();
    var $i = $(this);
    $('.sets a').not($i).toggleClass('pophide');
    $i.toggleClass('pop');
  });
}); 

});
