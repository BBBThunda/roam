@extends('layouts.master')

@section('bodyContent')

<style type="text/css">
    #map_canvas {
        border-style: solid;
        border-width: 5px;
        height: 500px;
    }
    body{
        background-color: #F2F2F2;
    }
    .one {
        float:left;
        width: 43%;
        margin-top: 30px;
        margin-right: 50px;
        margin-left: 50px;
    }
    .two {
        margin-top: 40px;
        height: 100%;
        margin-right:50px;
    }
    h1 {
        text-align: center;
        padding-bottom: 4%;
    }
    .background {
        background-image: url("images/quincy.jpg");
        width: 400px;
        height: 250px;
        margin-left: auto;
        margin-right: auto;
    }
    .guide_pic {
        border-right: 8px solid white;
        border-bottom: 8px solid white;

    }
    .tour_guide_name {
        padding-top: 10px;
        padding-bottom: 10px;
        margin: 0px;
        display:inline;
    }

    ul
    {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    #tourDataContainer li {
        padding: 0px 5px 40px 5px;
        border-style: solid;
        border-width: 2px;
        border-color: #B1B1B1;
        margin-bottom: 20px;
    }
    .btn {
        text-align: right;
        float: right;
    }
    .star {
        float: right;
        height: 20px;
    }
    .text {
        margin-left: 47px;
        margin-right: 47px;
    }


</style>
<div class="row">
    <div class="one">
        <h3>Available Tours for Boston, MA</h3>

        <ul id="tourDataContainer">
            
            @foreach ($data['tours'] as $tour)
            <li>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>{{{ $tour->name }}}</h2>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="background">
                    <img src="pictures/stockPic_9.jpg" alt="image"
                    class="guide_pic" />
                </div>
                <div class="text">
                    <h3 class="tour_guide_name">
                        {{{ $tour->guide->first()->display_name }}}</h3>
                    <div class="pull-right">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                    </div>
                    <hr>
                    <div class="panel-body">
                        <div>
                            <h3 style= "text-align:left; float: left;">$33</h3>
                            <div class="pull-right">
                                <a href="#" class="btn btn-primary btn-xs">Check Out This Tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
            @endforeach


            {{--
            <li>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>Quincy Market</h2>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="background">
                    <img src="pictures/stockPic_9.jpg" alt="image" class="guide_pic" />
                </div>
                <div class="text">
                    <h3 class="tour_guide_name">Lauren</h3>
                    <div class="pull-right">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                        <img class="star" src="pictures/Star.png">
                    </div>
                    <hr>
                    <div class="panel-body">

                        <li>
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <h2>Greentown Lab</h2>
                                <div class="pull-right">
                                </div>
                            </div>
                            <div class="background">
                                <img src="pictures/anna.jpg" alt="image" class="guide_pic" />
                            </div>
                            <div class="text">
                                <h3 class="tour_guide_name">Anna</h3>
                                <div class="pull-right">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div>
                                        <h3 style= "text-align:left; float: left;">$36</h3>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-primary btn-xs">Check Out This Tour</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li>

                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <h2>Boston Commons</h2>
                                <div class="pull-right">
                                </div>
                            </div>
                            <div class="background">
                                <img src="pictures/stockPic_17.jpg" alt="image" class="guide_pic" />
                            </div>
                            <div class="text">
                                <h3 class="tour_guide_name">Reis</h3>
                                <div class="pull-right">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                    <img class="star" src="pictures/Star.png">
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div>
                                        <h3 style= "text-align:left; float: left;">$25</h3>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-primary btn-xs">Check Out This Tour</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    </li>
                    --}}




                </ul>  
                <div class="two map">
                    <div id="map_canvas"></div>
                </div>

            </div>



            <script type="text/javascript" src = "http://maps.googleapis.com/maps/api/js?sensor=false"></script>
            <script src="scripts/map.js" type="text/javascript"></script>
            <script src = "scripts/main.js"></script>

            @stop
