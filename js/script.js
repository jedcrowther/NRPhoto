jQuery(document).ready(function($) {
  
  /* 
   *  Parallax Hero Image and Logo
   */
  var parallaxImage = document.getElementById('masthead');
  var parallaxContent = document.getElementById('ParallaxContent');
  var windowScrolled;
  window.addEventListener('scroll', function() {
    windowScrolled = window.pageYOffset || document.documentElement.scrollTop;
    parallaxImage.style.transform = 'translate3d(0, ' + windowScrolled / 4 + 'px, 0)';
    parallaxContent.style.transform = 'translate3d(0, ' + windowScrolled / 6 + 'px, 0)';
  });
  
  
  /* 
   *  Toggles Mobile Menu full screen overlay
   */
  var $toggles = $('.menu__icon');
  var $toggleLink = $('.link');
  $toggles.on('click', function() {
    $(this).closest('.menu').toggleClass('open');
    $('.shadow').toggle();
  });
  $toggleLink.on('click', function() {
    $(this).closest('.menu').toggleClass('open');
  });

  /* 
   *  Starscape full page overlay for mobile menu
   */
  function createStars(i) {
    for (var i; i; i--) {
      drawStars();
    }
  }
  function drawStars() {
    var tmpStar = document.createElement('figure');
    tmpStar.className = "star";
    tmpStar.style.top = 100 * Math.random() + '%';
    tmpStar.style.left = 100 * Math.random() + '%';
    document.getElementById('site-navigation').appendChild(tmpStar);
    document.getElementById('fourohfour').appendChild(tmpStar);
  }
  function animateStars() {
    stars = document.querySelectorAll(".star");
    Array.prototype.forEach.call(stars, function(el, i) {
      TweenMax.to(el, Math.random() * 0.5 + 0.5, {
        opacity: Math.random(),
        onComplete: animateStars
      });
    });
  }
  createStars(50);
  animateStars();
  
  /*
   * Scroll Reveal effect on homepage
   */       
  window.sr = ScrollReveal();
  sr.reveal('.reveal', {
    delay: 0.2,
    scale: 0.98,
    duration: 1000
  });

});