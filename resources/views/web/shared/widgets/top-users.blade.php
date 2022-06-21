<ul class="widget-top-users__list widget-top-users-list">
    @foreach($users as $index => $user)
        <li class="widget-top-users-list__item widget-top-users-list-item">
            <div class="widget-top-users-list-item__preview">
                <img class="widget-top-users-list-item__image" src="{{ $user->avatar() }}" alt="{{ $user->name }}">
                @if ($user->isOnline())
                    <div class="widget-top-users-list-item__status widget-top-users-list-item__status--online"></div>
                @else
                    <div class="widget-top-users-list-item__status"></div>
                @endif
            </div>
            <div class="widget-top-users-list-item__info">
                <div class="widget-top-users-list-item__nickname">{{ $user->login }}</div>
                <div class="widget-top-users-list-item__name">{{ $user->name }}</div>
                <div class="widget-top-users-list-item__category" title="{{ $user->occupation->title }} / {{ $user->activityType->title }}">{{ $user->occupation->title }} / {{ $user->activityType->title }}</div>
            </div>
        </li>
    @endforeach
</ul>
