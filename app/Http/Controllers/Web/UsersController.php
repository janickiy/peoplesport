<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $page = new \stdClass();
        $page->title = 'Пользователи';
        $page->content = '';

        $users = User::orderBy('created_at', 'asc')->paginate(45);

        return view('web.users.index', [
            'page'  => $page,
            'users' => $users,
            'seo' => Seo::renderAttributes($page->title)
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(Request $request, int $id)
    {
        return response()->redirectToRoute('users.questionnaire', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function questionnaire(Request $request, int $id)
    {
        if ($user = User::with(['gender', 'activityType', 'position', 'occupation'])->find($id)) {
            return view('web.users.questionnaire', [
                'user' => $user,
                'seo' => Seo::renderAttributes(
                    sprintf('Анкета пользователя %s', $user->name)
                )
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function subscriptions(Request $request, int $id)
    {
        if ($user = User::find($id)) {
            return view('web.users.subscriptions', [
                'user' => $user,
                'seo' => Seo::renderAttributes(
                    sprintf('Подписки пользователя %s', $user->name)
                )
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function subscribers(Request $request, int $id)
    {
        if ($user = User::find($id)) {
            return view('web.users.subscribers', [
                'user' => $user,
                'seo' => Seo::renderAttributes(
                    sprintf('Подписчики пользователя %s', $user->name)
                )
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function awards(Request $request, int $id)
    {
        if ($user = User::find($id)) {
            return view('web.users.awards', [
                'user' => $user,
                'seo' => Seo::renderAttributes(
                    sprintf('Награды пользователя %s', $user->name)
                )
            ]);
        }

        return response()->view('errors.404', [], 404);
    }
}
