import { mergeDeep } from '../helpers/utils';
import Component from './Component'

export default class Dropdown extends Component {
    elements = {
        popover: null,
        trigger: null,
    }

    constructor(element, options = {}) {
        super('Dropdown', element, mergeDeep({
            closest: true,
            position: 'bottom-left',
            classes: {
                active: 'dropdown--open',
                activeCustom: '',
                position: 'dropdown--position-%',
                popover: 'dropdown__popover',
                trigger: 'dropdown__trigger'
            },
        }, options))

        if (!this.element) return;

        this.elements.popover = this.element.querySelector(`.${this.options.classes.popover}`)
        this.elements.trigger = this.element.querySelector(`.${this.options.classes.trigger}`)

        if (this.options.closest) {
            const body = document.querySelector('body')

            body.addEventListener('click', this._onClickClosestHandler.bind(this))
            body.addEventListener('keyup', this._onKeyupHandler.bind(this))
        }

        this.elements.trigger.addEventListener('click', this._onClickToggleHandler.bind(this))

        this.setPosition()
    }

    _onKeyupHandler(event) {
        if (event.code === 'Escape' && this.isOpen()) {
            this.close()
        }
    }

    _onClickClosestHandler(event) {

        if (event.target.closest(`.${this.options.classes.active}`) === null && this.isOpen()) {
            this.close()
        }
    }

    _onClickToggleHandler(event) {
        event.preventDefault()

        this.isOpen() ? this.close() : this.open()
    }

    setPosition() {
        if (!this.options.position) return

        const className = this.options.classes.position.replace('%', this.options.position);

        this.element.classList.add(className)
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
