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
        $translations = []; // Define translations array
        $locale = app()->getLocale(); // Get current locale
        $filePath = resource_path('lang/'. $locale .'.json'); // Define file path

        // If file exists, decode it and assign to translations array
        if (file_exists($filePath)) {
            $translations = json_decode(file_get_contents($filePath), true);
        }

        return array_merge(parent::share($request), [
            // Share locale with Inertia
            'locale' => function () use ($locale){
                return $locale;
            },
            // Share translations with Inertia
            'trans' => function () use ($translations) {
                return $translations;
            },
            // Share user with Inertia
            'auth' => [
                'user' => $request->user(),
            ],
            // Share Ziggy routes with Inertia
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
