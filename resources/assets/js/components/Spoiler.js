import Component from './Component';
import { mergeDeep } from '../helpers/utils';

export default class Spoiler extends Component {
    constructor(element, options = {}) {
        super('Spoiler', element, mergeDeep({
            closest: true,
            classes: {
                active: 'spoiler--open',
                title: 'spoiler__title',
                content: 'spoiler__content'
            },
        }, options))

        this.elements = {
            title: element.querySelector(`.${this.options.classes.title}`),
            content: element.querySelector(`.${this.options.classes.content}`),
        }

        this.elements.title.addEventListener('click', this._onClickToggleHandler.bind(this))
    }

    _onClickToggleHandler(event) {
        event.preventDefault()

        this.isOpen() ? this.close() : this.open()
    }

    open() {
        this.element.classList.add(this.options.classes.active)

        if (this.options.classes.activeCustom) {
            this.element.classList.add(this.options.classes.activeCustom)
        }
    }

    close() {
        this.element.classList.remove(this.options.classes.active)

        if (this.options.classes.activeCustom) {
            this.element.classList.remove(this.options.classes.activeCustom)
        }
    }

    isOpen() {
        return this.element.classList.contains(this.options.classes.active)
    }
}
