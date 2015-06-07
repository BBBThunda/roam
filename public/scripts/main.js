console.log("Main Script initialized")



function setup(){

  $(".target").click(function() {
    var idnumber =  $(this).attr("data-tour-id");
    console.log(idnumber);
  //  debugger;
    $.post("signupForTour.php",
    {
        name: idnumber
    },
    function(data, status){
        alert(data);
    });

  });



}



$( document ).ready(function() {
  setup();
})
