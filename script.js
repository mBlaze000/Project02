// JavaScript Document

$(document).ready(function() {
	if ($('#use_delim :selected').text()=='UseCamelCase') {
		$("#capitalize").hide();
	}
    $('#use_delim').bind('click',function() {
		if ($(this).val()=='camel') {
			$("#use_caps").val('');
			$("#capitalize").hide();
		} else {
			$("#capitalize").show();
		}
    });
});
