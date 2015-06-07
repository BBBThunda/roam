@extends('layouts.master')

@section('bodyContent')

<style type="text/css">
.fist_block{
    padding-left: 17%;
    padding-top: 15%;
    height: 400px;
    background-image: url("/pictures/IMG_0026.gif");
    background-repeat: no-repeat;
    background-size: 1200px;
    /*background-color: #2B2B68;*/
    color: white;
}
.second_block{
    padding-left: 17%;
    padding-bottom: 100px;
}
#second_block_text{
    padding-top: 40px;
    text-align: center;
    padding-bottom: 40px;
}
.third_block{
    padding-left: 17%;
    padding-top: 40px;
    padding-bottom: 50px;
    background-repeat: no-repeat;
    background-image: url("/pictures/boston_backbay.jpg");
    background-size: 1200px;
    /*background-color: #2B2B68;*/
    color: white;
}
.third_block_text {
    margin-left: 0px;
    padding-right: 200px;
}
.third_block_pic{
    display: inline;
}
#logo_pic{
    width: 115px;
}
.tour_pic{
    display: block;
    height: 146px;
    margin-right: 20px;
    border-style: solid;
    border-width: 10px;
    border-color: white;
}
.btn {
    background-image: none;
    background-color: #FC730B;
}
.social_media_pic {
    float: left;
    height: 40px;
    padding-left: 5px;
}
.social_media {
    margin-left: 46%;
}
.social_media_text {
    text-align: center;
}
/*video #bgVideo {
position: fixed;
height: 600px;
background-size: cover;
}*/
</style>


<div class="fist_block">
    <div class="fist_block_text">
        <h1>Roam The Town</h1>
        <h3>Explore A City With A Local Student</h3>
        <form class="form-inline" method="GET" action="/tours">
            <select class="input-large">
                <option>Enter City</option>
                <option>Boston</option>
                <option>Cambridge</option>
            </select>
            <input type="text" class="input-medium" placeholder="Date(MM/DD/YYYY)">
            <select class="input-medium">
                <option>Time</option>
                <option>8:00 am</option>
                <option>9:00 am</option>
                <option>10:00 am</option>
                <option>11:00 am</option>
                <option>12:00 pm</option>
                <option>1:00 pm</option>
                <option>2:00 pm</option>
                <option>3:00 pm</option>
                <option>4:00 pm</option>
                <option>5:00 pm</option>
                <option>6:00 pm</option>
                <option>7:00 pm</option>
                <option>8:00 pm</option>
                <option>9:00 pm</option>
                <option>10:00 pm</option>
                <option>11:00 pm</option>
            </select>
            <button type="submit" class="btn">Find Tours</button>
        </form>
    </div>
</div>
<h1 id="second_block_text">Tours Near You!</h1>
<div class="second_block">
    <div class="row">
        <div class="span3 tour_pic">
            <img src="pictures/greentown_labs.jpg" alt="Greenton Labs Tour">
        </div>
        <div class="span3 tour_pic">
            <img src="pictures/boston_commons.jpg" alt="Boston Commons Tour">
        </div>
        <div class="span3 tour_pic">
            <img src="pictures/quincy_market.jpg" alt="Quincy Market Tour">
        </div>
    </div>
</div>
<div class="third_block">
    <h1>What Is Roam?</h1>
    <div class="third_block_text">
        <p>Roam is the platform that matches you, the newcomer that is seeking an inexpensive personalized tour in the city, with the perfect guide to give it.   Roam evolves the tour to you – permitting unique interest themes from leading tech to Hollywood film sites while meeting others across town that share the same.  No $40 experience identical to thousands before you, no headphones, no need to explore on your own, no more being stuck on campus during your limited free time.</p> 
        <p>Instead, Roam. </p>
    </div>
</div>
<div class="fourth_block">
    <div class="span3">

    </div>
    <div class="span3">

    </div>
    <br/>
    <h4 class="social_media_text">Roam With Us On</h4>
    <div class="social_media">
        <img class="social_media_pic" src="pictures/Facebook_logo.png" alt="Facebook Logo">
        <img class="social_media_pic" src="pictures/Twitter_logo.png" alt="Twitter Logo">
    </div>

</div>
@stop
