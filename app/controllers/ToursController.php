<?php

class ToursController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
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
        dd(Auth::user()->is_guide);
        if (empty(Auth::user()->is_guide)) {
            return ('[
        {"tour_guide_display_name":"Jason",
        "tour_guide_id":"2",
        "tour_type_id":"1",
        "start_time":"' . $time11 . '",
        "end_time":"' . $time12 . '",
        "latitude":"42.359799",
        "longitude":"-71.054460" 
        },
        {"tour_guide_display_name":"Anna",
        "tour_guide_id":"1",
        "tour_type_id":"2",
        "start_time":"' . $time1130 . '",
        "end_time":"' . $time12 . '",
        "latitude":"42.381128",
        "longitude":"-71.103550" 
        },
        {"tour_guide_display_name":"Bobby",
        "tour_guide_id":"3",
        "tour_type_id":"2",
        "start_time":"' . $time13 . '",
        "end_time":"' . $time1330 . '",
        "latitude":"42.355477",
        "longitude":"-71.063918" 
        }');
        } else {
            return ('[
        {"attendee_display_name":"Julian",
        "tour_type_id":"2",
        "start_time":"' . $time10 . '",
        "end_time":"' . $time12 . '",
        "latitude":"42.367382",
        "longitude":"-71.042271",
        "distance":"10",
        "attendee_id":"4"
        }
        {"attendee_display_name":"Stuart",
        "tour_type_id":"1",
        "start_time":"' . $time1130 . '",
        "end_time":"' . $time1230 . '",
        "latitude":"42.344839",
        "longitude":"-71.115820",
        "distance":"15",
        "attendee_id":"5"
        }');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return "create!";
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        return "store!";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        return "show!";
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return "edit!";
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}