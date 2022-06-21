<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use OptimistDigital\NovaSettings\Models\Settings;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $settings = Settings::all()->pluck('value', 'key');
            $settings['mainEnableFollow'] = isset($settings['mainEnableFollow']) && (bool)$settings['mainEnableFollow'];
            $settings['mainTitle'] = $settings['mainTitle'] ?? '';
            $settings['mainDescription'] = $settings['mainDescription'] ?? '';
            $settings['mainKeywords'] = $settings['mainKeywords'] ?? '';

            $settings['promoBlocks'] = $this->parsePromoBlocks($settings);
            $settings['promoSlider'] = $this->parsePromoSlider($settings);
            $settings['homeBanners'] = $this->parseBanners($settings, 'homeBanners');
            $settings['newsBanners'] = $this->parseBanners($settings, 'newsBanners');
            $settings['eventsBanners'] = $this->parseBanners($settings, 'eventsBanners');

            $settings['headerLogotype'] = $settings['headerLogotype'] ? Storage::disk('public')->url($settings['headerLogotype']) : 'https://via.placeholder.com/229x47?text=Logotype';
            $settings['footerLogotype'] = $settings['footerLogotype'] ? Storage::disk('public')->url($settings['footerLogotype']) : 'https://via.placeholder.com/229x47?text=Logotype';
            $settings['footerCopyright'] = str_replace(PHP_EOL, '<br>', $settings['footerCopyright']);

            $view->with('settings', $settings);
        });

        View::composer('web.static.partners', function ($view) {
            $settings = Settings::all()->pluck('value', 'key');

            $view->with('contacts', [
                'title' => $settings['partnersContactsTitle'] ?? '',
                'items' => json_decode($settings['partnersContactsList'], true) ?: [],
            ]);

            $view->with('feedback', [
                'title' => $settings['partnersFeedbackTitle'] ?? '',
                'description' => $settings['partnersFeedbackDescription'] ?? '',
            ]);
        });
    }

    private function parseBanners($settings, $position)
    {
        return array_map(function ($item) {
            $item['attributes'] = array_merge($item['attributes'], [
                'image' => isset($item['attributes']['image']) ? Storage::disk('public')->url($item['attributes']['image']) : 'https://via.placeholder.com/250x320'
            ]);

            return $item;
        }, json_decode($settings[$position] ?? '', true) ?: []);
    }

    private function parsePromoBlocks($settings)
    {
        $data = array_map(function ($item) {
            $item['attributes'] = array_merge($item['attributes'], [
                'image' => isset($item['attributes']['image']) ? Storage::disk('public')->url($item['attributes']['image']) : 'https://via.placeholder.com/270x250',
                'icon'  => isset($item['attributes']['icon']) ? Storage::disk('public')->url($item['attributes']['icon']) : 'https://via.placeholder.com/16x16'
            ]);

            return $item;
        }, json_decode($settings['promoBlocks'], true) ?: []);

        return array_chunk($data, 2);
    }

    private function parsePromoSlider($settings)
    {
        return array_map(function ($item) {
            $item['attributes'] = array_merge($item['attributes'], [
                'image' => isset($item['attributes']['image']) ? Storage::disk('public')->url($item['attributes']['image']) : 'https://via.placeholder.com/570x530'
            ]);

            return $item;
        }, json_decode($settings['promoSlider'], true) ?: []);
    }
}
