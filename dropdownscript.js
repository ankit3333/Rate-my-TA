//JS CODE TO LINK DATABASE WITH HTML DROPDOWN BOX
$(document).ready(function () {
	$.getJSON("getCourses.php", success =function(data){
	var options ="";

	for( var i=0;i<data.length;i++){
				//options+= "<option value='" + data[i] + "'>" + data[i] + "</option>";

		options+= "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
	}
	$("#course").append(options);
	// $("#course").change();
});

$("#course").change(function()
{
	var element="";
	element = $(this).val();
//	var newelement;
	//newelement=element.toUpperCase();
	$.getJSON("getTA.php?Courses="+$(this).val(),  success =function(data){
	var options ="";

	for( var i=0;i<data.length;i++){

		options+= "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";
	}
	$("#TAname").html("");
	$("#TAname").append(options);
	//window.alert("newelement");
});

});








});
