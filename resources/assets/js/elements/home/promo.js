import Splide from '@splidejs/splide';

const slider = document.querySelector('.home-promo-slider')

if (slider) {
    const splide = new Splide(slider, {
        gap     : 'var(--spacer-x)',
        type    : 'loop',
        perPage : 1,
        pagination: true,
    })

    splide.mount()
}
