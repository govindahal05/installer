<?php

// namespace RachidLaasri\LaravelInstaller\Controllers;

// use App\Http\Controllers\Controller;
use Helpers\EnvironmentManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EnvironmentController extends BaseController
{

    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager, Request $input, Redirector $redirect)
    {
        $this->EnvironmentManager = $environmentManager;
        $this->input = $input;
        $this->redirect = $redirect;
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environment()
    {
        $envConfig = $this->EnvironmentManager->getEnvContent();

        return View::make('environment', compact('envConfig'));
    }

    /**
     * Processes the newly saved environment configuration and redirects back.
     *
     * @param Request $input
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $message = $this->EnvironmentManager->saveFile($this->input);

        return $this->redirect->route('environment')
                    ->with(['message' => $message]);
    }

}
