import { getLogger } from '../helpers/logger'
import { debounce, mergeDeep, getId } from '../helpers/utils';

let instances = {}

export default class Component {
    id = null
    name = null
    element = null
    options = {}

    constructor(name, element, options = {}) {
        if (!element) {
            return
        }

        this.id = getId(name + '_')
        this.name = name
        this.element = element
        this.options = mergeDeep(this.options, options)

        element.dataset.componentId = this.id

        if (!instances[this.name]) {
            instances[this.name] = {}
        }

        instances[this.name][this.id] = this

        this._initHandlers()
    }

    _initHandlers() {
        if (this.onResize) {
            this.resizeObserver = new ResizeObserver(debounce(this.onResize.bind(this), 100)).observe(this.element);
        }
    }

    get logger() {
        return getLogger(this.name)
    }

    get instances() {
        return instances[this.name]
    }

    static init(element, options = {}) {
        const componentElement = document.querySelectorAll(element)

        if (componentElement.length) {
            [...componentElement].forEach(el => new this(el, options))
        }
    }
}
