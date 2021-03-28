<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->handle();
    }

    /**
     * Runs on every request.
     */
    public function handle(): void
    {
        //
    }
}
