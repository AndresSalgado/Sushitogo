$(function () {
    var w = $(window);
    var sliderContainer = $("#menu-slider-container");
    var sliderUl = $("#menu-slider");
    var sliderLi = sliderUl.children("li");
    var sliderNext = $("#menu-slider-next");
    var sliderPrev = $("#menu-slider-prev");
    var sliderLiWidth = sliderLi.eq(0).width();
    sliderUl.width(sliderLi.length * sliderLiWidth);

    if (sliderUl.width() > sliderContainer.width()) {
        sliderNext.fadeIn();
    }

    sliderNext.on("click", function () {
        var x = parseInt(sliderUl.css("marginLeft"));
        var ulWidth = sliderUl.width();
        if (ulWidth + x >= sliderContainer.width()) {
            x -= sliderLiWidth * 4;
            if (ulWidth + x < sliderContainer.width()) {
                x = sliderContainer.width() - ulWidth - 10;
            }
            sliderUl.stop().animate({ marginLeft: x }, 800);
            sliderPrev.fadeIn();
            console.log(
                parseInt(sliderUl.css("marginLeft")) * -1,
                ulWidth - sliderContainer.width()
            );
        }
        if (
            parseInt(sliderUl.css("marginLeft")) * -1 >=
            ulWidth - sliderContainer.width() * 2
        ) {
            sliderNext.fadeOut();
        }
    });

    sliderPrev.on("click", function () {
        var x = parseInt(sliderUl.css("marginLeft"));
        var ulWidth = sliderUl.width();
        if (x <= 0) {
            x += sliderLiWidth * 4;
            if (x > 0) {
                x = 0;
            }
            sliderUl.stop().animate({ marginLeft: x }, 800);
            sliderNext.fadeIn();
            if (x == 0) {
                sliderPrev.fadeOut();
            }
        }
    });
});


 // Script del menu de navegacion del cliente

 $('.ui.sidebar').sidebar({
    // context: $('.ui.pushable.segment'),
    transition: 'overlay'
}).sidebar('attach events', '#mobile_item');