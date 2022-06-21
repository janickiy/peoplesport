<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('created_at', 'asc')->paginate(12);

        return view('web.news.index', [
            'news' => $news,
            'seo' => Seo::renderAttributes('Новости')
        ]);
    }

    public function single(Request $request, $slug)
    {
        if ($news = News::where('slug', $slug)->first()) {
            return view('web.news.single', [
                'news' => $news
            ]);
        }

        return response()->view('errors.404', [], 404);
    }
}
