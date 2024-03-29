<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $perPage;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->perPage = 10;
    }
}
