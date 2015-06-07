<?php

class UsersController extends BaseController {

    /*
    |------------------
    | Users Controller
    |------------------
    |
    |
     */

    /**
     * Display registration page
     *
     * @return Response
     */
    public function register()
    {
        return View::make('users.register');
    }




    /**
     * Store a newly created User
     *
     * @return Response
     */
    public function store()
    {

        // Validate user input
        $rules = array(
            'email' => array('required', 'email', 'unique:users'),
            'display_name' => array('required', 'alpha_num', 'min:3', 'max:32', 'unique:users'),
            'password' => array('required', 'confirmed')
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $isGuide = !empty(Input::get('is_guide')) ? 1 : 0;

        // Create user
        $user = User::create([
            'email' => Input::get('email'),
                'display_name' => Input::get('display_name'),
                'password' => Hash::make(Input::get('password')),
                'is_guide' => $isGuide
            ]);

        return View::make('users.welcome');
    }




    /**
     * editProfile
     * Display form for logged in user to edit their profile
     *
     * @return Response
     */
    public function editProfile()
    {

        If (Auth::guest()) {
            return Redirect::to('/login');
        }

        $data['user'] = User::find(Auth::id());

        return View::make('users.editProfile')->with('user', $data['user']);

    }




    /**
     * updateProfile
     * Update logged in user's profile
     *
     * @return Response
     */
    public function updateProfile()
    {

        // Default success message
        $message = 'Profile updated successfully!';

        $user = User::find(Auth::id());

/*        // Validate user input
        $validator = User::validate(Input::all(), $user->id);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
 */
        if (!$user) {
            return App::abort(403);
        }

        // Validate user input
        $rules = array(
            'email' => array('required', 'email', 'unique:users'),
            'display_name' => array('required', 'alpha_num', 'min:3', 'max:32', 'unique:users'),
            'password' => array('confirmed')
        );

            // Update user table
        try {
            $user->display_name = Input::get('display_name');
            if(!empty(Input::get('password'))) {
                $user->password = Hash::make(Input::get('password'));
            }
            $isGuide = !empty(Input::get('is_guide')) ? 1 : 0;
            $user->is_guide = $isGuide;
            $user->save();
        }
        catch (Exception $e) {
            $message = 'Sorry, we were unable to update this profile due to the following issue: '
                . $e->getMessage();
            return Redirect::back()->with('message', $message);
        }

        return Redirect::to('/tours')->with('message', $message);

    }





    /**
     * destroy
     * Delete User from DB
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $result = $user->delete();

        if ($result == false)
        {
            // Throw error
            return ('Error deleting user');
        }

        Auth::logout();

        return ('User deleted successfully');
    }

    public function home()
    {
        $data['user'] = Auth::id();
        return View::make('users.home');
    }

}
