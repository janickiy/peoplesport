import Splide from '@splidejs/splide';

const slider = document.querySelector('.home-news__slider')

if (slider) {
    const splide = new Splide(slider, {
        gap     : 'var(--spacer-x)',
        type    : 'loop',
        perPage : 3,
        pagination: true,
        breakpoints: {
            559: {
                perPage: 1,
            },
            990: {
                perPage: 2,
            }
        }
    })

    splide.mount()
}
