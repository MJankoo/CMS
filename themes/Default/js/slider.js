const slider = document.querySelector('.worlds_cuisines_slider');
const sliderItems = document.querySelectorAll(".world_cuisine");

const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

let sliderCurrentPosition = 3;
let size = sliderItems[0].clientWidth + 0.02 * document.querySelector('.worlds_cuisines_slider').clientWidth;

slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';

//
nextBtn.addEventListener('click', function() {
    if(sliderCurrentPosition >= (sliderItems.length-3)) return;
    slider.style.transition = "transform 0.3s ease-in-out";
    sliderCurrentPosition++;
    slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
});

prevBtn.addEventListener('click', function() {
    if(sliderCurrentPosition <= 3) return;
    slider.style.transition = "transform 0.3s ease-in-out";
    sliderCurrentPosition--;
    slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
});

slider.addEventListener('transitionend', function () {
    if(sliderItems[sliderCurrentPosition].id === 'lastClone') {
        slider.style.transition = "none";
        sliderCurrentPosition = sliderItems.length - 4;
        slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
    }

    if(sliderItems[sliderCurrentPosition].id === 'firstClone') {
        slider.style.transition = "none";
        sliderCurrentPosition = sliderItems.length - sliderCurrentPosition;
        slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
    }
});

window.addEventListener('resize', function () {
    size = sliderItems[0].clientWidth + 0.01 * window.innerWidth;
});