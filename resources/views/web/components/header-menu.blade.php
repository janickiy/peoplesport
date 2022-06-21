<ul class="header-menu {{ $classes }}">
    @foreach($menu['menuItems'] as $item)
        <li class="header-menu__item header-menu-item">
            <a class="header-menu-item__link" href="{{ $item['value'] }}" target="{{ $item['target'] }}">
                {{--<i class="header-menu-item__icon icon icon--bell icon--solid"></i>--}}
                <span class="header-menu-item__label">{{ $item['name'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
