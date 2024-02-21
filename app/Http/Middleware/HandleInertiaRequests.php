<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $translations = [];
        $locale = app()->getLocale();
        $filePath = resource_path('lang/'. $locale .'.json');

        if (file_exists($filePath)) {
            $translations = json_decode(file_get_contents($filePath), true);
        }

        return array_merge(parent::share($request), [
            'locale' => function () use ($locale){
                return $locale;
            },
            'translations' => function () use ($translations) {
                return $translations;
            },
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
