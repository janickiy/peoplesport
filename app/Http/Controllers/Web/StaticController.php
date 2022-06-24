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
use App\Models\Support;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use URL;

class StaticController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function awards()
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function faq()
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

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function single(Request $request, $slug)
    {
        if ($page = Page::where('slug', $slug)->first()) {
            return view('web.static.page', [
                'page' => $page
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function support()
    {
        $page = new \stdClass();
        $page->title = 'Служба поддержки';
        $page->content = '<p>Оставьте Ваше сообщение и контактные данные и наши специалисты свяжутся с Вами<br>
                           ближайшее рабочее время для решения Вашего вопроса.</p>';

        return view('web.static.support', [
            'page'  => $page,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sendMsg(Request $request)
    {
        $rules = [
            'message' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ];

        $message = [
            'name.required' => 'Укажите Ваше имя!',
            'email.required' => 'Не указан Email!',
            'email.email' => 'Не верно указан Email!',
            'message.required' => 'Введите сообщение',
            'subject.required' => 'Выберите тему обращения!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Support::create($request->all());

        return redirect(URL::route('support'))->with('success', 'Ваше сообщение успешно отправлено');
    }
}
