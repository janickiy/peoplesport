import Dropdown from '../../components/Dropdown';

const profile = new Dropdown(document.querySelector('.header-profile'), {
    position: '',
    classes: {
        active: 'header-profile--open',
        position: '%',
        popover: 'header-profile__popover',
        trigger: 'header-profile__trigger'
    }
})

const nav = document.querySelector('.header-nav__list')
const navMobile = nav.cloneNode(true)
const mobileWrapper = document.querySelector('.header-mobile')
const toggleButton = document.querySelector('.header-nav__toggle')

navMobile.classList.add('header-nav__list--mobile')
mobileWrapper.appendChild(navMobile)
toggleButton.addEventListener('click', event => {
    event.preventDefault()

    const icon = toggleButton.querySelector('.icon')

    mobileWrapper.classList.toggle('header-mobile--open')
    icon.classList.toggle('icon--bars')
    icon.classList.toggle('icon--times-circle')
})
