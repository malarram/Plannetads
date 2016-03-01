var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

$(function(){
  $('.search-container select').selectric();

  $.validator.setDefaults({
    'errorClass'   : 'uk-text-danger uk-form-help-block',
    'errorElement' : 'p',
    highlight: function (element, errorClass, validClass) {
        console.log('highlight');
        $(element).removeClass(errorClass).addClass('uk-form-danger');
    },
    unhighlight: function (element, errorClass, validClass) {
        console.log('un highlight');
        $(element).removeClass('uk-form-danger').addClass(validClass);
    },
  });
});

$(".main-search").vegas({
	    delay: 8000,
    timer: false,
    shuffle: true,
    transitionDuration: 2000,
  slides: [
        { src: baseURL+"themes/default/images/cover1.jpg" },
        { src: baseURL+"themes/default/images/cover2.jpg" },
        { src: baseURL+"themes/default/images/cover3.jpg" }

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