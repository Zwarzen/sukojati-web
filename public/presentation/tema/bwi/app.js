$(document).ready(function(){



});



function switch_tab(obj)

{

    $(".tabs > div").attr("class", "tab");

    $(obj).attr("class", "current_tab");

}

function formatNumber(input)

{

    var num = input.value.replace(/\,/g,'');

    if(!isNaN(num)){

    if(num.indexOf('.') > -1){

    num = num.split('.');

    num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');

    if(num[1].length > 2){

    alert('You may only enter two decimals!');

    num[1] = num[1].substring(0,num[1].length-1);

    } input.value = num[0]+'.'+num[1];

    } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };

    }

    else{ alert('Anda hanya diperbolehkan memasukkan angka!');

    input.value = input.value.substring(0,input.value.length-1);

    }

}





/* COMMON FUNCTIONS */





function send_form_loading(formObj,action,responseDIV)

{

    var image_load = "<i class='fa fa-refresh fa-spin'></i>";

    $.ajax({

        url: site+"/"+action, 

        data: $(formObj.elements).serialize(),

        beforeSend: function(){

            $(responseDIV).html(image_load);

        },

        success: function(response){

                $(responseDIV).html(response);

            },

        type: "post", 

        dataType: "html"

    }); 

    return false;

}

function load_small(page,div,loadingDom,opt){

    var image_load_small = "<i class='fa fa-refresh fa-spin'></i>";

    $.ajax({

        url: site+"/"+page,

        beforeSend: function(){

            $(loadingDom).html(image_load_small);

        },

        success: function(response){

            $(loadingDom).html('');

            if(opt=="append")

            {

                $(div).append(response);

            }

            else

            {

                $(div).html(response);

            }

        },

        dataType:"html"  		

    });

    return false;

}

function load_no_loading(page,div){

    $.ajax({

        url: site+"/"+page,

        success: function(response){

            $(div).html(response);

        },

        dataType:"html"  		

    });

    return false;

}

function dummyload(page){

    $.ajax({

        url: site+"/"+page,

        dataType:"html"  		

    });

    return false;

}

function send_form(formObj,action,responseDIV)

{

    $.ajax({

        url: site+"/"+action, 

        data: $(formObj.elements).serialize(), 

        success: function(response){

                $(responseDIV).html(response);

            },

        type: "post", 

        dataType: "html"

    }); 

    return false;

}



function load(page,div){

   var image_load = "<i class='fa fa-refresh fa-spin'></i>";

    $.ajax({

        url: site+page,

        beforeSend: function(){

            $(div).html(image_load);

        },



        success: function(response){

            $(div).html(response);

        },



      	error: function (xhr, ajaxOptions, thrownError) {

        	alert(xhr.status);

        	alert(thrownError);

      	},

        dataType:"html"  		

    });

    return false;

}







function ajaxmodal(urlnya)

{

		$('#ajax-modalin').load(urlnya, '', function(){

		$('#ajax-modal').modal();			

		});		

}

function ajaxmodal2(urlnya)

{

		$('#ajax-modalin2').load(urlnya, '', function(){

		$('#ajax-modal2').modal();			

		});		

}





