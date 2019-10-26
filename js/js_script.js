$('#sub').click(function(e) {
  //alert("hh");



  var name = $('#name').val();
var age = $('#age').val();
var designation = $('#designation').val();
var email = $('#email').val();
 var nameRGEX = /^[A-Z][a-z]+$/;
  var ageRGEX = /^[1-9][1-9]$/;
  var designationRGEX = /^[A-Z][a-z]+$/;
  var emailRGEX=/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

  if (!name.match(nameRGEX) || name.length == 0) {
$('#p1').text("* Please enter a valid name *"); 
$("#name").focus();
return false;
}
else
$('#p1').text(""); 

if (!age.match(ageRGEX) || age.length == 0) {
$('#p2').text("* Please enter a valid age *"); 
$("#age").focus();
return false;
}
else
$('#p2').text("");

if (!designation.match(designationRGEX) || designation.length == 0) {
$('#p3').text("* Please enter a valid designation *"); 
$("#designation").focus();
return false;
}
else
$('#p3').text("");

if (!email.match(emailRGEX) || email.length == 0) {
$('#p4').text(""); 
$("#email").focus();
return false;
}
else
	$('#p4').text("");

 $.post( $("#create").attr("action"), 
         $("#create :input").serializeArray(), 
         function(info){ $("#res").html(info); 
         //alert(info);
  });




});
$("#create").submit( function() {
  return false;	
});