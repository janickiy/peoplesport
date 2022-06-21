export const UUID = () =>'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,(c,r)=>('x'==с?(r=Math.random()*16|0):(r&0x3|0x8)).toString(16));

export const cryptoUUID = () => ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g,c=>(c^crypto.getRandomValues(new Uint8Array(1))[0]&15 >> c/4).toString(16));

export const id = (prefix = '') => prefix + Math.random().toString(16).slice(2)
