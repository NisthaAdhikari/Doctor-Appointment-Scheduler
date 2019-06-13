/**
 * Created by Sushant Gauchan
 */


var winWidth = $(window).width();
$(document).ready(function () {

    sliderInit();
    addClassInit();
    navInit();
});


/*------------------------------- Functions Starts -------------------------------*/
function sliderInit() {
    $('.home-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        speed:500,
        dots: false,
        arrows: true,
        autoplaySpeed: 5000,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
        ]
    });

/*    $('.product-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-image-nav'
    });

    $('.product-image-nav').slick({
        slidesToShow: 8,
        slidesToScroll: 8,
        asNavFor: '.product-image-slider',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,

                }
            },
        ]

    });*/


    $('.process-main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.process-nav-slider'
    });

    $('.process-nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        asNavFor: '.process-main-slider',
        dots: false,
        arrows: false,
        focusOnSelect: true,

    });
}

function addClassInit() {
   $('#header-wrapper #search-button').click(function () {
       $('#header-wrapper').toggleClass('search-open');
   });

   if(winWidth <= 767){
       $('#header-wrapper #search-button').click(function () {
           $('body').addClass('search-open-body');
       });

       $('.close-search').click(function () {
           $('body').removeClass('search-open-body');
           $('#header-wrapper').removeClass('search-open');
       });
   }
    $('#header-wrapper #nav-toggle').click(function () {
        $('#header-wrapper').toggleClass('nav-open');
    });

    $('#processSelect').on('change', function (e) {
        var $optionSelected = $("option:selected", this);
        $optionSelected.tab('show')
    });
}

function navInit() {

}



/*
$('#searchicon').click(function(){
    $('#itemwrap').toggleClass('active');
    $('#search').toggleClass('active');
    $('#search').focus();
});

$('#processSelect').on('change', function (e) {
    var $optionSelected = $("option:selected", this);
    $optionSelected.tab('show')
});

function classchange() {
    $('#searchicon').on('click', function () {
        $('.nav-container').toggleClass('open');
    });

    $('#searchicon').on('click', function () {
        $('.navigate').toggleClass('active');
    });

}

$('.nav-toggle').click(function(e){
    $(this).toggleClass('open');
    $('.second-nav').toggleClass('nav-open');

});*/
/*-------------------------------- Functions Ends --------------------------------*/
