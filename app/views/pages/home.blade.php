@extends('layouts.master')

@section('bodyContent')

<div class="fist_block">
    <div class="fist_block_text">
        <h1>Roam The Town</h1>
        <h3>Explore A City With A Local Student</h3>
        <form class="form-inline">
            <input type="text" class="input-large" placeholder="Enter City">
            <input type="text" class="input-medium" placeholder="Date">
            <select class="input-medium" placeholder="Time">
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
            <form action="/tours">
                <button type="submit" class="btn">Find Tours</button>
            </form>
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
    <h1>How Roam Works</h1>
    <div class="third_block_text">
        <h5>We connect traveling student to local students to provide tour ... </h5>
    </div>
    <div class="third_block_pic">
        <h4>picture</h4>
    </div>
</div>
<div class="fourth_block">
    <div class="span3">

    </div>
    <div class="span3">

    </div>
    <br>
    <p>Roam With Us On</p>

</div>

@stop
