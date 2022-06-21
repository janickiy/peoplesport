<section class="footer">
    <div class="footer__inner">
        <div class="footer-grid">
            <div class="footer-grid__item">
                <div class="footer__logotype logotype">
                    <a class="logotype__link" href="{{ route('home') }}">
                        <img class="logotype__image" src="{{ $settings['footerLogotype'] }}" alt="">
                    </a>
                </div>

                <div class="footer__copyright">
                    {!! $settings['footerCopyright'] !!}
                </div>
            </div>
            <div class="footer-grid__item footer-grid__item--widget">
                <x-footer-widget title="" type="menu" :params="['locate' => 'footer-1']" />
            </div>
            <div class="footer-grid__item footer-grid__item--widget">
                <x-footer-widget title="" type="menu" :params="['locate' => 'footer-2']" />
            </div>
            <div class="footer-grid__item footer-grid__item--widget">
                <x-footer-widget title="" type="menu" :params="['locate' => 'footer-3']" />
            </div>
        </div>
    </div>
</section>
