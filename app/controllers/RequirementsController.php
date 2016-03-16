<?php

// namespace RachidLaasri\LaravelInstaller\Controllers;

// use App\Http\Controllers\Controller;
use Helpers\RequirementsChecker;

class RequirementsController extends BaseController
{

    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $config = Config::get('installer');
        $requirements = $this->requirements->check($config);
        // dd($requirements);
        return View::make('requirements', compact('requirements'));
    }
}
