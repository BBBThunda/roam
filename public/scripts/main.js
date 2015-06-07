console.log("Main Script initialized")




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

  return '\
  <li>\
        <div class="background">\
            <img class="guide_pic" src="pictures/stockPic_17.jpg">\
        </div>\
        <h4 class="tour_name">Greentown Labs by Saran</h4>\
        <!--<p>An innovation in of itself, Boston has taken the world of tech by storm over the last decade. Already globally established are the areas innovation centers, incubators, universities, co-workspaces, bio-tech and leading tech businesses. The geographic and innovation diversity does not stop there.  Greentown Labs, based in Somerville, is a camp of some of the world\'s best in environmental technology.As ambitious and innovative as the changing world around us, Greentown is intent on sustaining its pace and impact into the future.</p>-->\
    </li>';




}


$( document ).ready(function() {
  siteLoad();
  setup();
})
