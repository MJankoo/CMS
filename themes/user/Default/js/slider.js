const slider = document.querySelector('.worlds_cuisines_slider');
const sliderItems = document.querySelectorAll(".world_cuisine");

const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

let sliderCurrentPosition = 3;
let size = sliderItems[0].clientWidth + 0.02 * document.querySelector('.worlds_cuisines_slider').clientWidth;

slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';

//
nextBtn.addEventListener('click', function() {
    if(sliderCurrentPosition >= (sliderItems.length-4)) return;
    slider.style.transition = "transform 0.3s ease-in-out";
    sliderCurrentPosition++;
    slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
});

prevBtn.addEventListener('click', function() {
    console.log(sliderCurrentPosition);
    if(sliderCurrentPosition <= 0) return;
    slider.style.transition = "transform 0.3s ease-in-out";
    sliderCurrentPosition--;
    slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
});

slider.addEventListener('transitionend', function () {
    if(sliderItems[sliderCurrentPosition+1].id === 'lastClone') {
        slider.style.transition = "none";
        sliderCurrentPosition = sliderItems.length - 5;
        slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
    }

    if(sliderItems[sliderCurrentPosition+1].id === 'firstClone') {
        slider.style.transition = "none";
        sliderCurrentPosition = sliderItems.length - (sliderCurrentPosition+2);
        slider.style.transform = 'translateX('+(-size * sliderCurrentPosition)+'px)';
    }
});

window.addEventListener('resize', function () {
    size = sliderItems[0].clientWidth + 0.01 * window.innerWidth;
});