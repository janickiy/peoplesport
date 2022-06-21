import Component from './Component'
import { mergeDeep } from '../helpers/utils';

export default class Table extends Component {
    elements = {
        container: null,
        wrapper: null,
    }

    constructor(element, options = {}) {
        super('Table', element, mergeDeep({
            classes: {
                container: 'table',
                scrollable: 'table--scrollable',
                wrapper: 'table__inner',
                table: 'table__element'
            }
        }, options))

        this._wrap()
    }

    onResize() {
        const { wrapper, container } = this.elements
        const hasScroll = wrapper.scrollWidth > wrapper.clientWidth

        if (hasScroll) {
            container.classList.add(this.options.classes.scrollable)
        } else {
            container.classList.remove(this.options.classes.scrollable)
        }
    }

    _wrap() {
        const container = document.createElement('div')
        container.classList.add(this.options.classes.container)

        const wrapper = document.createElement('div')
        wrapper.classList.add(this.options.classes.wrapper)

        this.element.parentNode.insertBefore(container, this.element);
        container.appendChild(wrapper);
        wrapper.appendChild(this.element);

        this.element.classList.add(this.options.classes.table)
        this.elements.container = container
        this.elements.wrapper = wrapper
    }
}
