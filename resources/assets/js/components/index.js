import Tooltip from './Tooltip'
import Dropdown from './Dropdown'
import Spoiler from './Spoiler'
import Select from './Select'
import Tabs from './Tabs'
import VideoFrame from './VideoFrame'
import Table from './Table'

Tooltip.init()
Select.init('.form-select')
Dropdown.init('.dropdown')
Spoiler.init('.spoiler')
Tabs.init('.tabs')
Table.init('.content table')
VideoFrame.init('.content video, .content iframe')
