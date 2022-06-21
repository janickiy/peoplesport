import Component from './Component';
import { mergeDeep } from '../helpers/utils';

export default class Tooltip extends Component {
    constructor(element, options = {}) {
        super('Tooltip', element, mergeDeep({}, options))
    }
}
