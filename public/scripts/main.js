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



$( document ).ready(function() {
  setup();
})
