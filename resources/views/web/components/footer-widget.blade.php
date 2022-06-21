<div class="footer-widget">
    @if ($title)
        <div class="footer-widget__title">{{ $title }}</div>
    @endif

    <div class="footer-widget__content">
        @switch($type)
            @case('menu')
                <x-footer-menu :locate="$params['locate']" />
            @break
        @endswitch
    </div>
</div>
