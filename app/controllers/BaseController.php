<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

        /**
         * Extend the constructor
         */
        public function __construct() {
            $userId = Auth::id();
            if ($userId) {
                $user = User::find($userId);
                View::share('userinfo', $user);
            }
            return $this;
        }
}
