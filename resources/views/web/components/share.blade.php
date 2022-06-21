<div class="share">
    <div class="share__heading"><i class="icon icon--solid icon--share"></i> Поделиться:</div>

    <ul class="share__list share-list">
        <li class="share-list__item share-list-item">
            <a class="share-list-item__link" href="http://vk.com/share.php?url={{ $url }}&title={{ $title }}" target="_blank" data-social="vk">
                <div class="tooltip tooltip--position-top">
                    <div class="tooltip__label share-list-item__icon icon icon--brand icon--vk"></div>
                    <div class="tooltip__content">Поделиться в VK</div>
                </div>
            </a>
        </li>
        <li class="share-list__item share-list-item">
            <a class="share-list-item__link" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st.comments={{ $title }}&st._surl={{ $url }}" target="_blank" data-social="odnoklassniki">
                <div class="tooltip tooltip--position-top">
                    <div class="tooltip__label share-list-item__icon icon icon--brand icon--odnoklassniki"></div>
                    <div class="tooltip__content">Поделиться в OK</div>
                </div>
            </a>
        </li>
        {{-- <li class="share-list__item share-list-item">
            <a class="share-list-item__link" href="http://www.facebook.com/plugins/like.php?href={{ $url }}" data-social="facebook" target="_blank">
                <div class="tooltip tooltip--position-top">
                    <div class="tooltip__label share-list-item__icon icon icon--brand icon--facebook-f"></div>
                    <div class="tooltip__content">Поделиться в Facebook</div>
                </div>
            </a>
        </li> --}}
        <li class="share-list__item share-list-item">
            <a class="share-list-item__link" href="http://twitter.com/share?url={{ $url }}&text={{ $title }}" target="_blank" data-social="twitter">
                <div class="tooltip tooltip--position-top">
                    <div class="tooltip__label share-list-item__icon icon icon--brand icon--twitter"></div>
                    <div class="tooltip__content">Поделиться в Twitter</div>
                </div>
            </a>
        </li>
    </ul>
</div>
