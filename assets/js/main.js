$(function(){
  $('.custom-select').selectric();
});

$(".main-search").vegas({
	    delay: 8000,
    timer: false,
    shuffle: true,
    transitionDuration: 2000,
  slides: [
        { src: "images/cover1.jpg" },
        { src: "images/cover2.jpg" },
        { src: "images/cover3.jpg" }

    ]
  
});


  jQuery(document).ready(function ($) {
        $('.polyglot-language-switcher').polyglotLanguageSwitcher()
                .on('popupOpening', function(evt){
                    console.log(evt);
                }).on('popupOpened', function(evt){
                    console.log(evt);
                }).on('popupClosing', function(evt){
                    console.log(evt);
                }).on('popupClosed', function(evt){
                    console.log(evt);
                });
    });