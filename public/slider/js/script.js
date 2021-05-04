$(function () {
    var slider = $(".slider"),
        slides = slider.find('li');
    let index = 0;
    slides.eq(index).addClass('current');
    slides.find('a').addClass("speech-bubble");


    var sliding = setInterval(slideIt, 3000);

    $("li a").mouseenter(function () {
        clearInterval(sliding);
    });

    $("li a").mouseleave(function () {
        sliding = setInterval(slideIt, 3000);
    });

    function slideIt() {
        index = (index + 1) % slides.length;
        slides.eq(index).addClass('current').removeClass('prev').siblings().removeClass('current');
        slides.eq(index).prevAll().addClass('prev');
        slides.eq(index).nextAll().removeClass('prev');

    }


});


