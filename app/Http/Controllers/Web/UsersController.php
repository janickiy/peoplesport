<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
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

    public function profile(Request $request, int $id)
    {
        return response()->redirectToRoute('users.questionnaire', ['id' => $id]);
    }

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
