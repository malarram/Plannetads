var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

$(function(){
  $('.search-container select').selectric();
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


var cities = {
    url: "js/cities.json",
    theme: "square",
    getValue: "name",
    list: {
        match: {
            enabled: true
        }
    }
};

$("#location-search").easyAutocomplete(cities);