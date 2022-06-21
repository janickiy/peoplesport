import Component from './Component';
import Dropdown from './Dropdown';
import { mergeDeep } from '../helpers/utils';

export default class Select extends Component {
    elements = {
        dropdown: null,
        option: null,
        control: null,
        placeholder: null,
    }

    constructor(element, options) {
        super('Select', element, mergeDeep({
            classes: {
                option: 'form-select__option',
                control: 'form-select__control',
                placeholder: 'form-select__placeholder'
            },

            dropdown: {
                classes: {
                    active: 'form-select--open',
                    position: 'select--position-%',
                    popover: 'form-select__items',
                    trigger: 'form-select__trigger',
                },
            }
        }, options))

        this.elements = {
            dropdown: new Dropdown(element, this.options.dropdown),
            option: element.querySelectorAll(`.${this.options.classes.option}`),
            control: element.querySelector(`.${this.options.classes.control}`),
            placeholder: element.querySelector(`.${this.options.classes.placeholder}`)
        }

        if (this.elements.option.length) {
            [...this.elements.option].forEach(el => el.addEventListener('click', this._onSelectHandler.bind(this)))
        }
    }

    _onSelectHandler(event) {
        event.preventDefault()

        const option = event.target

        this.elements.placeholder.value = option.innerText
        this.elements.control.value = option.getAttribute('data-value')
        this.elements.dropdown.close()
    }
}
