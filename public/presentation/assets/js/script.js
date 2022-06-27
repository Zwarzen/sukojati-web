$(window).load(function() 
{
    $("#demoskylo").trigger('click');

});


$("#change_pass").validate({
    rules: {
      password: "required",
      new_confirm: {
        equalTo: "#new"
      }
    },
});

// create new users page validation
$("#user_form_validation").validate({
    rules: {
       password : {
                  minlength : 8
              },
      confirm_password: {
        minlength : 8,
        equalTo: "#password"
      }
    },
});

// Add Category Form Validation
$(".blog_settings").validate();

// Add Category Form Validation
$("#add_cat_validate").validate();


// create new group validation

$("#create_gp").validate();

// create new group validation

$("#social_config").validate();


$("#dyna").click(function () 
{
  if ($("#dynamo").text() == "")
    $("#dynamo").text("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
  else {
    $("#dynamo").html($("#dynamo").text() + $("#dynamo").text());
  }
})

$("#dyna-del").click(function () {
  $("#dynamo").html("");
})  

$(function () {

	$(".panel-color-list>li>span").click(function(e) {
		$(".panel").attr('class','panel').addClass($(this).attr('data-style'));
	});
	
});


