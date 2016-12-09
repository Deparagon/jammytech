/*




*/
$(document).ready(function(){
$('body').on('click', '#deleteeducationnewone', function(ev){
		ev.preventDefault();
		//alert('clicked');
		var eduline = $(this).closest('tr');
		var edutodel = {
			 _token: $('input[name= "_token"]').val(),
			 idedu: $(this).data('edutionadb'),
		}

		var doedudelete =$.post('/user/delete/education', edutodel);
		    doedudelete.success(function(report){
		    	//alert(report);
		    	console.log(report);
               if(report['response'] =='success'){
               	eduline.fadeOut();
               }
             
		    });


	});

	$('body').on('click', '#kireadygoworkexperiencnow', function(ev){
		ev.preventDefault();
		var wexline = $(this).closest('tr');
		var wextodel = {
			 _token: $('input[name= "_token"]').val(),
			 idworkex: $(this).data('killworkexperienc'),
		}

		var dowkdelete =$.post('/user/delete/workexperience', wextodel);
		    dowkdelete.success(function(report){
		    	console.log(report);
               if(report['response'] =='success'){
               	wexline.fadeOut();
               }
             
		    });


	});


	$('body').on('click', '#killthisnegrunowfm', function(ev){
		ev.preventDefault();
		var gdeline = $(this).closest('tr');
		var gtodel = {
			 _token: $('input[name= "_token"]').val(),
			 idgurantor: $(this).data('ghasid'),
		}

		var gogdel =$.post('/user/delete/myguarantor', gtodel);
		    gogdel.success(function(report){
		    	//console.log(report);
               if(report['response'] =='success'){
               	gdeline.fadeOut();
               }
             
		    });


	});



	$('body').on('click', '#killthiscourseofdauser', function(ev){
		ev.preventDefault();
		var gdeline = $(this).closest('tr');
		var gtodel = {
			 _token: $('input[name= "_token"]').val(),
			 idteach: $(this).data('killcourseded'),
		}
              
		var gogdel =$.post('/user/delete/icanteach', gtodel);
		    gogdel.success(function(report){
		    	console.log(report);
               if(report =='OK'){
               	gdeline.fadeOut();
               }
             
		    });


	});



$('#searchcourbaycategorylist').on('submit', function(ev){
	ev.preventDefault();
	$('#searchcourselinkbtn').html('Searching.........');
     var searchdata = $(this).serialize();

     var psearch = $.post('/user/searchcourse', searchdata);

     psearch.success(function(report){
     $('#searchcourselinkbtn').html('Search Completed');
     $('#returnsearchresultdatahere').html(report);
     	//alert(report)

     });

});


$('#applyfortutorbtnclick').on('click', function(ev){
	 ev.preventDefault();
	 $('#applyfortutorbtnclick').html('Submiting request.......');
	 $('#applyfortutorbtnclick').prop('disabled', 'true');
   
   var datreq = {
   	    _token: $('input[name= "_token"]').val(),
   }
   var apptutor = $.post('/user/betutor', datreq);
       apptutor.success(function(report){
       $('#applyfortutorbtnclick').html('Submitted');
       //$('#applyfortutorbtnclick').html('Submitted');
       $('#showboxreturntutorrequest').html(report);
        //alert(report);


       });
});

$('#bankdata').hide();

$('#paystak').on('click', function(){
	$('#paystackdata').toggle();
	$('#bankdata').hide();
});

$('#bank').on('click', function(){
	$('#bankdata').toggle();
	$('#paystackdata').hide();
});




$('#iherebayrejectthethecompletion').hide();
$('#iherebayacceepthecompletion').hide();
$('#rejectcompletionoftheclass').on('click', function(){
	$('#iherebayrejectthethecompletion').show();
$('#iherebayacceepthecompletion').hide();
});


$('#acceptthecompletb').on('click', function(){
   $('#iherebayacceepthecompletion').show();
   	$('#iherebayrejectthethecompletion').hide();

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

}); /* killbill */
	