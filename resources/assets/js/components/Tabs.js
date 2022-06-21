import { mergeDeep } from '../helpers/utils';
import Component from './Component'

export default class Tabs extends Component {
    map = {}
    elements = {
        triggers: null,
        items: null,
    }

    constructor(element, options = {}) {
        super('Tabs', element, mergeDeep({
            classes: {
                trigger: 'tabs-header__item',
                active: 'tabs-header__item--active',
                item: 'tabs-list__item',
            },
        }, options))

        if (!this.element) return

        this.elements.triggers = this.element.querySelectorAll(`.${this.options.classes.trigger}`)
        this.elements.items = this.element.querySelectorAll(`.${this.options.classes.item}`)

        if (this.elements.items.length) {
            [...this.elements.triggers].forEach(el => {
                const tabId = el.getAttribute('data-tab')
                const tabItem = [...this.elements.items].find(item => item.getAttribute('data-id') === tabId)

                this.map[tabId] = {
                    header: el,
                    body: tabItem
                }

                el.addEventListener('click', this._onClickTriggerHandler.bind(this))
            })
        }
    }

    _onClickTriggerHandler(event) {
        event.preventDefault()

        let tadId = event.target.getAttribute('data-tab')

        if (!event.target.classList.contains(this.options.classes.trigger)) {
            tadId = event.target.closest(`.${this.options.classes.trigger}`).getAttribute('data-tab')
        }

        for (const [id, item] of Object.entries(this.map)) {
            if (tadId === id) {
                item.header.classList.add(this.options.classes.active)
                item.body.style.display = 'block'
            } else {
                item.header.classList.remove(this.options.classes.active)
                item.body.style.display = 'none'
            }
        }
    }
}
