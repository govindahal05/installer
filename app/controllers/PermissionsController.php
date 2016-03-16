<?php

use Helpers\PermissionsChecker;

// namespace RachidLaasri\LaravelInstaller\Controllers;

// use App\Http\Controllers\Controller;
// use RachidLaasri\LaravelInstaller\Helpers\PermissionsChecker;

class PermissionsController extends BaseController
{

    /**
     * @var PermissionsChecker
     */
    protected $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {

        $config = Config::get('installer');
        $permissions = $this->permissions->check($config);
        // dd($permissions);
        return View::make('permissions', compact('permissions'));
    }
}
