
function setup(){

  $(".target").click(function() {
    var idnumber =  $(this).attr("data-tour-id");
    console.log(idnumber);
  //  debugger;
    $.post("proxy.php?url=http://45.33.82.240:5000/signUpForTour/1",
    {
        name: idnumber
    },
    function(data, status){
        alert(data)
    });

  });



}

function siteLoad(){

  $.ajax({
    url: "/tours",
    dataType: "json",
    context: document.body,
    method: "GET"
  }).done(function( data, textStatus, jqXHR ) {


    console.log(data);



  //  var tourData = JSON.parse(data);

    for(var i = 0; i < data.length; i++){



      var container = document.getElementById('tourDataContainer');

      container.innerHTML += GetTourHtml(data[i]);


    }



  });

}

function GetTourHtml (tourData) {

  console.log(tourData["tour_id"]);

  return '<li>\
      <div class="panel panel-default">\
            <div class="panel-body text-center">\
              <h2>'+tourData["name"]+'</h2>\
              <div class="pull-right">\
                  <p style="float:right;">Tech<p>\
              </div>\
            </div>\
            <div class="background">\
              <img src="pictures/stockPic_9.jpg" alt="image" class="guide_pic" />\
          </div>\
          <h3 class="tour_name">'+tourData["tour_guide_display_name"]+'</h3>\
          <div class="pull-right">\
              <img class="star" src="pictures/Star.png">\
              <img class="star" src="pictures/Star.png">\
              <img class="star" src="pictures/Star.png">\
              <img class="star" src="pictures/Star.png">\
          </div>\
          <hr>\
            <div class="panel-body">\
              <div>\
              <h3 style= "text-align:left; float: left;">$33</h3>\
                <div class="pull-right">\
                  <a href="#" class="btn btn-primary btn-xs">Check Out This Tour</a>\
                </div>\
              </div>\
            </div>\
          </div>\
      </li>'

}

$( document ).ready(function() {
  siteLoad();
  setup();
})
