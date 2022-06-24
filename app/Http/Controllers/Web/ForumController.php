<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Forum\Post;
use App\Models\Forum\Thread;
use App\Models\Forum\Topic;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $threads = Thread::where('parent_id', null)
            ->get()
            ->sortBy('title')
            ->groupBy(function ($item) {
                return mb_substr($item['title'], 0, 1);
            });

        return view('web.forum.index', [
            'threads' => $threads,
            'seo' => Seo::renderAttributes('Форум', '', '', null, 'noindex, nofollow')
        ]);
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function threads(Request $request, $slug)
    {
        if ($thread = Thread::where('slug', $slug)->first()) {
            return view('web.forum.threads', [
                'thread' => $thread,
                'topics' => $this->topicsByThread($thread, $request->get('sort') ?? 'created_at'),
                'children' => $thread->show_alphabet ? $this->threadsGroupByLatter($thread) : $thread->children,
                'seo' => Seo::renderAttributes($thread->title, '', '', null, 'noindex, nofollow')
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @param Request $request
     * @param $topicId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function topic(Request $request, $topicId)
    {
        if ($topic = Topic::where('id', $topicId)->first()) {
            return view('web.forum.topic', [
                'topic' => $topic,
                'posts' => $topic->posts()->with('replyPost')->paginate(12),
                'seo' => Seo::renderAttributes($topic->title)
            ]);
        }

        return response()->view('errors.404', [], 404);
    }

    /**
     * @param Request $request
     * @param $topicId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(Request $request, $topicId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Post::create([
            'content' => $request->get('message'),
            'topic_id' => $topicId,
            'reply_post_id' => $request->get('reply_post_id'),
            'user_id' => Auth::id()
        ]);

        return redirect()
            ->route('forum.topic', $topicId)
            ->with('success', 'Ваш комментарий опубликован');
    }

    /**
     * @param $thread
     * @return mixed
     */
    private function threadsGroupByLatter($thread)
    {
        return $thread
            ->children
            ->sortBy('title')
            ->groupBy(function ($item) {
                return mb_substr($item['title'], 0, 1);
            });
    }

    /**
     * @param $thread
     * @param string $sort
     * @return mixed
     */
    private function topicsByThread($thread, $sort = 'created_at')
    {
        $collections = $thread
            ->topics()
            ->withCount('posts')
            ->orderBy($sort, 'desc');


        return $collections->paginate(12);
    }
}
