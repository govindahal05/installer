<?php

// namespace RachidLaasri\LaravelInstaller\Controllers;

// use App\Http\Controllers\Controller;

class WelcomeController extends BaseController
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return View::make('welcome');
    }
}
