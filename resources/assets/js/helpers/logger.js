import Logger from 'js-logger'

Logger.useDefaults()

const getLogger = (namespace = 'Default') => Logger.get(namespace)

export default Logger

export {
    getLogger
}
