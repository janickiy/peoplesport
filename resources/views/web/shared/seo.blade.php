@php
    if (isset($page) && $page && method_exists($page, 'getSeoMeta')) {
        $seo = $page->getSeoMeta();
    } elseif (isset($seo) && isset($settings) && is_array($seo) && isset($seo['title'])) {
        // ...
    } else {
        $seo = [
            'title' => $settings['mainTitle'],
            'description' =>  $settings['mainDescription'],
            'keywords' => null
        ];
    }

    if ($seo && $seo['title']) {
        $seo['title'] = $seo['title'] . ' | ' . $settings['mainTitle'];
    } else {
        $seo['title'] = $settings['mainTitle'];
    }

    $seo['description'] = $seo['description'] ?? $settings['mainDescription'];
    $seo['keywords'] = $seo['keywords'] ?? $settings['mainKeywords'];

    if(!empty($seo['params'])){
        if(!empty($seo['params']->title_format)){
            $seo['title'] = str_replace(':text', $seo['title'], $seo['params']->title_format);
        }

    }
@endphp

<title>{{ $seo['title'] }}</title>

@if(config('seo.seo_status'))
    @if(isset($seo['description']) && $seo['description'])
        <meta name="description" content="{{ $seo['description'] }}" />
    @endif

    @if(isset($seo['keywords']) && $seo['keywords'])
        <meta name="keywords" content="{{ $seo['keywords'] }}" />
    @endif

    <meta property="og:title" content="{{ $seo['title'] }}" />
    <meta property="og:description" content="{{ $seo['description'] }}" />

    @if(!empty($seo['image_path']))
        <meta property="og:image" content="{{ $seo['image_path'] }}" />
    @endif
@else
    <meta name="robots" content="{{ !empty($seo['follow_type']) && config('seo.seo_status') ? $seo['follow_type'] : 'noindex, nofollow' }}" />
@endif
