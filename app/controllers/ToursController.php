<?php

class ToursController extends BaseController {

    /**
     * Instantiate a new ToursController instance.
     */
    public function __construct() {
        $this->beforeFilter('auth');
        parent::__construct();
    }

    /**
     * Display a listing of tours
     *
     * @return Response
     */
    public function index()
    {
        // For now we return dummy data for JSON requests
        // TODO: Make this return live data
        // TODO: Include lat/long coordinates
        if (Request::wantsJson()) {
            $time10 = strtotime('2015-06-07 10:00:00' . ' EST');
            $time1030 = strtotime('2015-06-07 10:30:00' . ' EST');
            $time11 = strtotime('2015-06-07 11:00:00' . ' EST');
            $time1130 = strtotime('2015-06-07 11:30:00' . ' EST');
            $time12 = strtotime('2015-06-07 12:00:00' . ' EST');
            $time1230 = strtotime('2015-06-07 12:30:00' . ' EST');
            $time13 = strtotime('2015-06-07 13:00:00' . ' EST');
            $time1330 = strtotime('2015-06-07 13:30:00' . ' EST');
            $jstime10 = ($time10*1000);
            $jstime1030 = ($time1030*1000);
            $jstime11 = ($time11*1000);
            $jstime1130 = ($time1130*1000);
            $jstime12 = ($time12*1000);
            $jstime1230 = ($time1230*1000);
            $jstime13 = ($time13*1000);
            $jstime1330 = ($time1330*1000);

            // Get tours within the user's area
            if (empty(Auth::user()->is_guide)) {
                return ('[
            {"tour_id":"1",
            "name":"Super Tour",
            "tour_guide_display_name":"Jason",
            "tour_guide_id":"2",
            "tour_type_id":"1",
            "start_time":"' . $time11 . '",
            "end_time":"' . $time12 . '",
            "latitude":"42.359799",
            "longitude":"-71.054460"
            },
            {"tour_id":"2",
            "name":"Epic Tour",
            "tour_guide_display_name":"Anna",
            "tour_guide_id":"1",
            "tour_type_id":"2",
            "start_time":"' . $time1130 . '",
            "end_time":"' . $time12 . '",
            "latitude":"42.381128",
            "longitude":"-71.103550"
            },
            {"tour_id":"3",
            "name":"AMAZING Tour",
            "tour_guide_display_name":"Bobby",
            "tour_guide_id":"3",
            "tour_type_id":"2",
            "start_time":"' . $time13 . '",
            "end_time":"' . $time1330 . '",
            "latitude":"42.355477",
            "longitude":"-71.063918"
            }]');
            } else {
                return ('[
            {"tour_id":"4",
            "attendee_display_name":"Julian",
            "tour_type_id":"2",
            "start_time":"' . $time10 . '",
            "end_time":"' . $time12 . '",
            "latitude":"42.367382",
            "longitude":"-71.042271",
            "distance":"10",
            "attendee_id":"4"
            },
            {"tour_id":"5",
            "attendee_display_name":"Stuart",
            "tour_type_id":"1",
            "start_time":"' . $time1130 . '",
            "end_time":"' . $time1230 . '",
            "latitude":"42.344839",
            "longitude":"-71.115820",
            "distance":"15",
            "attendee_id":"5"
            }]');
            }
        } else { // Non-JSON

            //TODO: Add setting for location and distance

            $location = Input::get('location');
            $distance = Input::get('distance');
            
            //For now just grab all tours from db
            $data['tours'] = Tour::all();
            $data['users'] = User::all();
            
            return View::make('tours.index')->with('data', $data);
        }
    }

    /**
     * Offer to give a requested tour
     *
     * @param $tourId
     */
    public function claim($tourId) {

        $tour = Tour::find($tourId);

        if ($tour->canClaim()) {

            // Claim Tour
            $tour->claim(Auth::id());

            // TODO: Return success

        }

        // TODO: Return error

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // TODO: Move these to constants
        $quarterHour = 15 * 60;
        $hour = 60 * 60;
        $displayStringTime = 'h:i a';
        $displayStringDate = 'm/d/Y';

        // Populate view

        // Default start time to next hour rounded to nearest 15 min
        $defaultStartTime = time() + $hour + $quarterHour -
            (time() % $quarterHour);
        $data['defaultStartTime'] = date($displayStringTime, $defaultStartTime);
        $data['defaultStartDate'] = date($displayStringDate, $defaultStartTime);

        $defaultEndTime = $defaultStartTime + $hour;
        $data['defaultEndTime'] = date($displayStringTime, $defaultEndTime);
        $data['defaultEndDate'] = date($displayStringDate, $defaultEndTime);

        return View::make('tours.create')->with('data', $data);
    }


    /**
     * Store a newly created tour
     *
     * @return Response
     */
    public function store()
    {

        // Validate input
        $rules = array(
            'name' => array('required','unique:tours'),
            'description' => array('required'),
            'start_date' => array('required', 'date_format:m/d/Y'),
            'start_time' => array('required', 'date_format:h:i a'),
            'end_date' => array('required', 'date_format:m/d/Y'),
            'end_time' => array('required', 'date_format:h:i a'),
            //'tour_type_id' => array(''),
            'price' => array('numeric')
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }



        // Create tour
        $tour = Tour::create([
            'name' => Input::get('name'),
                'description' => Input::get('description'),
                'tour_type_id' => Input::get('tour_type_id'),
                'price' => Input::get('price'),
                'start_time' => Input::get('start_time'),
                'end_time' => Input::get('end_time')
                ]);
        $userId = Auth::id();
        $user = User::find($userId);


        if (empty($user->is_guide)) {
            $tour->attendee_id = $userId;
        } else {
            $tour->tour_guide_id = $userId;
        }
        $tour->price = Input::get('price');
        $tour->save();


        return Redirect::to('/');
    }


    /**
     * Display the specified tour.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($tourId)
    {
        //
        return "show!";
    }


    /**
     * Show the form for editing the specified tour.
     *
     * @param  int  $tourId
     * @return Response
     */
    public function edit($tourId)
    {
        //
        return "edit!";
    }


    /**
     * Update the specified tour
     *
     * @param  int  $tourId
     * @return Response
     */
    public function update($tourId)
    {
        //
    }


    /**
     * Remove the specified tour
     *
     * @param  int  $tourId
     * @return Response
     */
    public function destroy($tourId)
    {
        //
    }


}
