const replayPostElements = () => {
    return {
        field: document.querySelector('#reply_post_field'),
        cancel: document.querySelector('#reply_post_field a'),
        label: document.querySelector('#reply_post_field span'),
        input: document.querySelector('#reply_post_field input'),
        buttons: document.querySelectorAll('[data-replay-post-button]')
    }
}

const replayPost = (id, scroll = true) => {
    const { input, label } = replayPostElements()

    input.value = id
    label.innerHTML = `#${id}`

    if (scroll) {
        showReplayPostPanel(true)
    }
}

const showReplayPostPanel = (scroll = false) => {
    const { field } = replayPostElements()

    field.style.display = 'block'

    if (scroll) {
        field.scrollIntoView({ block: 'center', behavior: 'smooth' });
    }
}


const hideReplayPostPanel = () => {
    const { field, input } = replayPostElements()

    field.style.display = 'none'
    input.value = ''
}

const { buttons, cancel } = replayPostElements()

if (buttons) {
    buttons.forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault()

            replayPost(button.getAttribute('data-replay-post-button'))
        })
    })
}

if (cancel) {
    cancel.addEventListener('click', e => {
        e.preventDefault()

        hideReplayPostPanel()
    })
}
