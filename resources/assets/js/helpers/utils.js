function isObject(item) {
    return (item && typeof item === 'object' && !Array.isArray(item));
}

export const mergeDeep = (target, ...sources) => {
    if (!sources.length) return target;
    const source = sources.shift();

    if (isObject(target) && isObject(source)) {
        for (const key in source) {
            if (isObject(source[key])) {
                if (!target[key]) Object.assign(target, { [key]: {} });
                mergeDeep(target[key], source[key]);
            } else {
                Object.assign(target, { [key]: source[key] });
            }
        }
    }

    return mergeDeep(target, ...sources);
}

export const debounce = (callback, wait) => {
    let timeout = null
    return (...args) => {
        const next = () => callback(...args)
        clearTimeout(timeout)
        timeout = setTimeout(next, wait)
    }
}

export const getEmValueFromElement = (element, pixelValue) => {
    if (element.parentNode) {
        const parentFontSize = parseFloat(window.getComputedStyle(element.parentNode).fontSize);
        const elementFontSize = parseFloat(window.getComputedStyle(element).fontSize);
        const pixelValueOfOneEm = (elementFontSize / parentFontSize) * elementFontSize;

        return (pixelValue / pixelValueOfOneEm);
    }
    return false;
}

export const getId = (prefix = '') => prefix + Math.random().toString(16).slice(2)
