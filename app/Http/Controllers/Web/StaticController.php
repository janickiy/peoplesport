<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackEmail;
use App\Models\Award\AwardCategory;
use App\Models\Event\Event;
use App\Models\Event\EventCategory;
use App\Models\News;
use App\Models\Page\Faq;
use App\Models\Page\Page;
use App\Models\Settings;
use App\Models\User;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaticController extends Controller
{
    public function home(Request $request)
    {
        $topBloggers = User::orderBy('created_at', 'asc')->paginate(4);
        $news = News::orderBy('created_at', 'asc')->with(['user.occupation', 'user.activityType'])->paginate(10);
        $eventsCategories = EventCategory::orderBy('created_at', 'asc')
            ->take(4)
            ->get();

        $latestEventsCategories = $eventsCategories
            ->map(function (EventCategory $category) {
                $category->setAttribute('items', Event::orderBy('created_at', 'asc')->with('user')->take(4)->get());

                return $category;
            });

        $popularEventsCategories = $eventsCategories
            ->map(function (EventCategory $category) {
                $category->setAttribute('items', Event::orderBy('created_at', 'asc')->with('user')->take(3)->get());

                return $category;
            });

        return view('web.static.home', [
            'news'                      => $news,
            'latestEventsCategories'    => $latestEventsCategories,
            'popularEventsCategories'   => $popularEventsCategories,
            'topBloggers'               => $topBloggers
        ]);
    }

    public function awards(Request $request)
    {
        $page = new \stdClass();
        $page->title = 'Награды';
        $page->content = '<p>Дорогой пользователь, здесь ты можешь видеть полученные награды за активное участие в жизни сайта.</p>
                          <p>Награды являются твоими достижениями и влияют на твой рейтинг на сайте, их могут видеть все пользователи
                          нашего сайта. Повышая рейтинг, ты получаешь больше возможностей и авторитет. Если ты еще не получал наград,
                          но очень хочешь этого, переходи и узнай как стать еще круче!</p>';

        $categories = AwardCategory::with('awards')->get();

        return view('web.static.awards', [
            'page' => $page,
            'categories' => $categories,
            'seo' => Seo::renderAttributes($page->title)
        ]);
    }

    public function partners(Request $request)
    {
        $page = new \stdClass();
        $page->title = 'Партнерам';
        $page->sendEmail = false;

        if ($request->method() == 'POST') {
            $page->sendEmail = true;
            $settings = Settings::where('key', 'mainEmail')->pluck('value', 'key');
            $email = new \stdClass();
            $email->name = $request->get('email');
            $email->phone = $request->get('phone');

            Mail::to($settings['mainEmail'])->send(new FeedbackEmail($email));
        }

        return view('web.static.partners', [
            'page'  => $page,
            'seo' => Seo::renderAttributes($page->title)
        ]);
    }

    public function faq(Request $request)
    {
        $page = new \stdClass();
        $page->title = 'Вопрос ответ';
        $page->content = '<p>Вы можете задать любой вопрос на интересующую вас тему о работе нашего сайта.</p>
                          <p>Мы постараемся ответить на него как можно быстрее и подробнее.</p>';

        $items = Faq::all();

        return view('web.static.faq', [
            'page'  => $page,
            'items' => $items,
            'seo' => Seo::renderAttributes($page->title)
        ]);
    }

    public function single(Request $request, $slug)
    {
        if ($page = Page::where('slug', $slug)->first()) {
            return view('web.static.page', [
                'page' => $page
            ]);
        }

        return response()->view('errors.404', [], 404);
    }
}
