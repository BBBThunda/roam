<?php

class UsersController extends BaseController {

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
            'password' => array('min:4', 'required', 'confirmed')
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

        if (!$user) {
            return App::abort(403);
        }

        // Define validation rules
        $rules = [
            'email' => ['required', 'email'],
            'display_name' => ['required', 'alpha_num', 'min:3', 'max:32'],
            'password' => ['min:4', 'confirmed'],
            'profile_pic' => ['image']
            ];
        // If email or display name is being changed it must be unique
        // TODO: add validation by sending an actual email
        if (Input::get('email') != $user->email) {
            $rules['email'][] = 'unique:users'; 
        }
        if (Input::get('display_name') != $user->display_name) {
            $rules['display_name'][] = 'unique:users';
        }
        // Validate user input
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Update user table
        $user->display_name = Input::get('display_name');
        if(!empty(Input::get('password'))) {
            $user->password = Hash::make(Input::get('password'));
        }
        $isGuide = !empty(Input::get('is_guide')) ? 1 : 0;
        $user->is_guide = $isGuide;
        $user->save();

        if (Input::hasFile('profile_pic')) {
            // Get existing photo(s) to be replaced
            $oldPhoto = $user->photos()->first();

            // Generate filepath based on ID and extension
            $file = Input::file('profile_pic');

            // First insert empty photo record to get an ID                
            $photo = new Photo();
            $photo->user_id = Auth::id();
            $photo->extension = $file->getClientOriginalExtension();
            $photo->save();

            // Update photo record and move file
            // TODO: add error handling
            $file->move($photo->getDirectory(), $photo->getFilename());
            $photo->save();

            $user->photos()->save($photo);
            if ($oldPhoto) {
                if (!empty($oldPhoto->getFilepath())) {
                    File::delete($oldPhoto->getFilepath());
                }
                $oldPhoto->delete();
            }
        }
        // TODO: Add error handling here

        $message = 'Profile pic updated successfully!';

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
