<ul class="footer-menu">
    @foreach($menu['menuItems'] as $item)
        <li class="footer-menu__item footer-menu-item">
            <a href="{{ $item['value'] }}" target="{{ $item['target'] }}" class="footer-menu-item__link">{{ $item['name'] }}</a>
        </li>
    @endforeach
</ul>
