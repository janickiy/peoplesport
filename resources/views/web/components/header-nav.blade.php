<div class="header-nav">
    <ul class="header-nav__list">
        @foreach($menu['menuItems'] as $item)
            <li class="header-nav__item header-nav-item">
                <a class="header-nav-item__link" href="{{ $item['value'] }}" target="{{ $item['target'] }}">
                    {{ $item['name'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <a class="header-nav__toggle" href="#"><i class="icon icon--light icon--bars"></i></a>
</div>
