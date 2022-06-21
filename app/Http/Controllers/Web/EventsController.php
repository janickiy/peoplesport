<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('created_at', 'asc')->paginate(12);

        return view('web.events.index', [
            'events' => $events,
            'seo' => Seo::renderAttributes('Мероприятия')
        ]);
    }

    public function single(Request $request, $slug)
    {
        if ($event = Event::where('slug', $slug)->first()) {
            $relatedEvents = Event::orderBy('created_at', 'asc')->with('user')->take(3)->get();

            return view('web.events.single', [
                'event' => $event,
                'relatedEvents' => $relatedEvents
            ]);
        }

        return response()->view('errors.404', [], 404);
    }
}
