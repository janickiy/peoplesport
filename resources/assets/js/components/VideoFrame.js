import Component from './Component'
import { getEmValueFromElement, mergeDeep } from '../helpers/utils'

export default class VideoFrame extends Component {
    elements = {
        container: null,
        wrapper: null,
    }

    constructor(element, options = {}) {
        super('VideoFrame', element, mergeDeep({
            classes: {
                container: 'video-frame',
                wrapper: 'video-frame__inner',
                video: 'video-frame__element'
            }
        }, options))

        this._wrap()
    }

    onResize() {
        this.calculateSize()
    }

    calculateSize() {
        const { element } = this
        const height = 9 * element.offsetWidth / 16;

        element.style.height = `${getEmValueFromElement(element, height)}rem`;
    }

    _wrap() {
        const container = document.createElement('div')
        container.classList.add(this.options.classes.container)

        const wrapper = document.createElement('div')
        wrapper.classList.add(this.options.classes.wrapper)

        this.element.parentNode.insertBefore(container, this.element);
        container.appendChild(wrapper);
        wrapper.appendChild(this.element);

        this.elements.container = container
        this.elements.wrapper = wrapper
        this.element.classList.add(this.options.classes.video)
    }
}
