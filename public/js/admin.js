/*

*/


$(document).ready(function(){
	

	$('body').on('click', '#killcategorybtnwithajaxinadmin', function(ev){
		ev.preventDefault();
		var cateline = $(this).closest('tr');
		var categorytodel = {
			 _token: $('input[name= "_token"]').val(),
			 idcategory: $(this).data('killcatid'),
		}

		var docatedelete =$.post('/admin/delete/cat', categorytodel);
		    docatedelete.success(function(report){
		    	console.log(report);
               if(report['response'] =='success'){
               	cateline.fadeOut();
               }
             
		    });


	});

	$('body').on('click', '#killcoursesbtnwithajaxinadmin', function(ev){
		ev.preventDefault();
		var courseline = $(this).closest('tr');
		var coursetodel = {
			 _token: $('input[name= "_token"]').val(),
			 idcourse: $(this).data('killcatid'),
		}

		var docoursedelete =$.post('/admin/delete/course', coursetodel);
		    docoursedelete.success(function(report){
		    	console.log(report);
               if(report['response'] =='success'){
               	courseline.fadeOut();
               }
             
		    });


	});




$('#approveatutorsjoinreq').on('click', function(ev){
        ev.preventDefault();
    var conf = confirm('Sure Go ahead');
    if(conf){
       $('#approveatutorsjoinreq').html('<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Loading...</span>')

    	var appdata = {
    		 idreq: $('#dareqid').val(),
    		  _token: $('input[name= "_token"]').val(),
    		 defeedback: $('#feedback').val(),

    	}
    	var sendapproval = $.post('/admin/tutoraction/approve', appdata);
    	   sendapproval.success(function(report){
    	   	$('#approveatutorsjoinreq').html('Request Completed');
    	   	$('#showmereportdataapp').html(report);

    	   })
    }
});

$('#justcommentonreqtutor').on('click', function(ev){
        ev.preventDefault();

       $('#justcommentonreqtutor').html('<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Loading...</span>')

    	var appdata = {
    		 idreq: $('#dareqid').val(),
    		  _token: $('input[name= "_token"]').val(),
    		 defeedback: $('#feedback').val(),

    	}
    	var sendcomment = $.post('/admin/tutoraction/comment', appdata);
    	   sendcomment.success(function(report){
    	   	$('#justcommentonreqtutor').html('Request Completed');
    	   	$('#showmereportdataapp').html(report);

    	   });
    
});

$('body').on('submit', '#approveordisapprovemen', function(ev){
          ev.preventDefault(); 
          var conf = confirm('Want to Approve?');
          if(conf){
             $('#proceseachrequestedcourd').html('<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Loading...</span>');

             var creqdata = $(this).serialize();

        //alert(creqdata);
        var goapprov = $.post('/admin/requestaction/approve', creqdata);
           goapprov.success(function(report){
             $('#proceseachrequestedcourd').html(report);
           });
          }
        
});

$('body').on('click', '#trashicanteachrequestn', function(ev){
          ev.preventDefault(); 

          var conf = confirm('Want to Delete?');
          var trline = $(this).closest('tr');
          if(conf){
             var creqdata = {
                  id_request: $(this).data('tracouricanq'),
                  _token: $('input[name= "_token"]').val(),

              }

        var godell = $.post('/admin/requestaction/deleteicanteach', creqdata);
           godell.success(function(report){
             trline.fadeOut();
           });
          }
        
});

$('body').on('click', '#approvethipendreqicanteach', function(ev){
          ev.preventDefault(); 
          var conf = confirm('Want to Approve?');
          var trline = $(this).closest('tr');

          if(conf){
             var creqdata = {
                  id_request: $(this).data('icanteachidapp'),
                  _token: $('input[name= "_token"]').val(),

              }

        var godell = $.post('/admin/requestaction/approveicanteach', creqdata);
           godell.success(function(report){
            trline.css('background', 'green');
           });
          }
        
});

$('body').on('click', '#bankkillprow', function(ev){
          ev.preventDefault(); 
          var conf = confirm('Want to Trash Bank?');
          var trline = $(this).closest('tr');

          if(conf){
             var creqdata = {
                  idbank: $(this).data('klbank'),
                  _token: $('input[name= "_token"]').val(),

              }

        var godell = $.post('/admin/bank/delete', creqdata);
           godell.success(function(report){
            trline.css('background', 'red');
           });
          }
        
});



    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".topmostnavbar").addClass("scrolltopbarbg");
          
        } else {
           $(".topmostnavbar").removeClass("scrolltopbarbg");
        }
    });


$('#frontpaysearchbaruser').on('change keyup', function(){
   
   if($('#frontpaysearchbaruser').val().length >2){
 
    var seardata = {
       _token: $('input[name= "_token"]').val(),
       keyword: $(this).val(),
    }

    var sresult = $.post('/user/topsearch', seardata);
         sresult.success(function(report){

          $('#mysearchresultdisplay').html(report);

         })
   }
});




});// /Document is ready;