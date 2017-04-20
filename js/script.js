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
  console.log('hi');
    $(this).closest('.menu').toggleClass('open');
});

$toggleLink.on('click', function () {
    $(this).closest('.menu').toggleClass('open');
});
         
// scroll reveal on homepage         
window.sr = ScrollReveal();
sr.reveal('.reveal', { delay: 0.2, scale: 0.98, duration: 1000 });         
         
         
 $(document).ready(function(){
  $('.your-class').slick();
});     