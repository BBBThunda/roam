<?php

class PagesController extends BaseController {

    /**
     * Instantiate a new PagesController instance.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Show the homepage
     *
     * @return Response
     */
    public function home()
    {
        return View::make('pages.home');
    }

}
