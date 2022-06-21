import Tabs from '../../components/Tabs';

const widgets = document.querySelectorAll('.widget-popular-users');

if (widgets.length) {
    [...widgets].forEach(widget => {
        const tabs = new Tabs(widget.querySelector('.widget-popular-users-tabs'), {
            classes: {
                trigger: 'widget-popular-users-tabs-header__item',
                active: 'widget-popular-users-tabs-header__item--active',
                item: 'widget-popular-users-tabs-list__item',
            },
        })
    })
}
