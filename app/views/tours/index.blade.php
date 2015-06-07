@extends('layouts.master')

@section('bodyContent')

<style type="text/css">
#map_canvas {
    border-style: solid;
    border-width: 5px;
    height: 500px;
}
.span5{
    margin-right: 0px;
}
.row {
    margin-left: 3%;
}
.map {
    margin-left: 3%;
}
h1 {
    text-align: center;
    padding-bottom: 4%;
}
.background {
    background-image: url("pictures/greentown.jpg");
    width: 400px;
    height: 250px;
}
.guide_pic {
    border-width: 8px;
    border-style: solid;
    border-color: white;
}
.tour_name {
    padding-top: 10px;
    padding-bottom: 10px;
    margin: 0px;
}
td {
    padding: 20px 10px 30px 10px;
    border-width: 2px;
    border-style: solid;
    background-color: white;
}

</style>







<div class="row">
    <div class="span6">
        <h3>Available Tours for Boston, MA</h3>
    
            <ul id="tourDataContainer">
                <li>
                    <div class="background">
                        <img class="guide_pic" src="pictures/stockPic_17.jpg">
                    </div>
                    <h4 class="tour_name">Greentown Labs by Saran</h4>
                    <!--<p>An innovation in of itself, Boston has taken the world of tech by storm over the last decade. Already globally established are the areas' innovation centers, incubators, universities, co-workspaces, bio-tech and leading tech businesses. The geographic and innovation diversity does not stop there.  Greentown Labs, based in Somerville, is a camp of some of the world's best in environmental technology.As ambitious and innovative as the changing world around us, Greentown is intent on sustaining its pace and impact into the future.</p>-->
                </li>
                <li>
                    <img src=""><h4>Boston Commons</h4><p>Walk and let walk. This region of Boston is perfectly suited to combine exercise with wonder in the heart of it all. Starting at the State House you will achieve the seemingly impossible feat of connecting government center, the financial district, the Back Bay, Boston Common and its Public Garden in less than 3 miles. Next stop, the Boston Marathon? </p>
                </li>
                <li>
                    <img src=""><h4>Quincy Market</h4><p>Its no secret that Boston is a focal point of the nation's birth. It will be your secret when you experience the Hub of history on your terms and off the beaten path. All of the locations of the freedom trail are on the historical tour. Yet, the timeline since Paul Revere is walked with rare and non-scripted anecdotes being spoken and guided into your own personal curiosity. </p>
                </li>
            </ul>
        <!--<div style ="background-color:#aaa">
          <h9>id=1</h9>
        <h3>Greg's awsome tour!!</h3>
        <img src="sprint.png" style = "width:50;height:50;">
        <h5>My tour is so cool and you should definatly go! It's sooooo awsome!!!!!!!11!!1!1</h5>
        <button data-tour-id = "1" class="target" type = "button"> Book This Tour!</button>
        </div>
      <br><br>
        <div style = "background-color:#aaa">
          <h9>id=2</h9>
        <h3>Bob's awsome tour!!</h3>
        <img src="sprint.png" style = "width:50;height:50;"></img>
        <h5>My tour is so cool. It's better than greg's</h5>
        <button data-tour-id = "2" class="target" type = "button"> Book This Tour!</button>
        </div>
        <script src = "scripts/main.js"></script> -->       
    </div>
    <div class="span6 map">
        <div id="map_canvas"></div>
    </div>

</div>










<script type="text/javascript" src = "http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="scripts/map.js" type="text/javascript"></script>
<script src = "scripts/main.js"></script>

@stop
