/*
  MENU 

*/

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".topmostnavbar").addClass("scrolltopbarbg");
          
        } else {
           $(".topmostnavbar").removeClass("scrolltopbarbg");
        }
    });

jQuery(".zetta-menu1").zettaMenu({"sticky":false,"showOn":"hover"});

$('#formsearchsubmitfabtn').on('click', function(){
   $('#searchformmid').submit();
});
  /*

       CREATE USER
  */
$(document).ready(function(){
$('body').on('submit', '#tutorregistrationformele', function(ev){
         ev.preventDefault();
        $('#reportajaxregistrationstate').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');

         var userdata = $(this).serialize();
        var registeruser = $.ajax({
                 url:'/createuser',
                 data: userdata,
                 type: 'POST',
                 dataType:'json',

        });
        registeruser.success(function(report){
            if(report['email']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-danger" role="alert">'+report['email'][0]+'</div>');  
            }
            if(report['password']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-danger" role="alert">'+report['password'][0]+'</div>');  

            }

            if(report['firstname']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-danger" role="alert">'+report['firstname'][0]+'</div>');  
            }
             if(report['lastname']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-danger" role="alert">'+report['lastname'][0]+'</div>');  
            }
        if(report['Captcha']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-danger" role="alert">'+report['Captcha'][0]+'</div>');  
            }
  if(report['response']){
            $('#reportajaxregistrationstate').html('<div class="alert alert-success" role="alert">Welcome to Tutorago, Please Login and Update your profile</div>');  
                 var i = 1;
                        setInterval(function () {
                            if(i == 0) {
                                  $('#regformlocatesmallpage').modal('hide');

                                    $('#dologincallshortpage').modal('show');
                            }
                            i--;
                        }, 1000);




            }
           //console.log(report);

        });
});


/*

 LOGIN USER

*/
$('body').on('submit', '#ajaxlogintutorago', function(ev){

         ev.preventDefault();
         var userdata = $(this).serialize();
        var login = $.ajax({
                 url:'/loginuser',
                 data: userdata,
                 type: 'POST',
                 dataType:'json',

        });
        login.success(function(report){
        	if(report['response']  =='mismatch'){
        		$('#reportajaxloginstate').html('<div class="alert alert-danger" role="alert">Incorrect username and password combination | Ensure your account has been verified </div>');
        	}
        	if(report['password']){
        		$('#reportajaxloginstate').html('<div class="alert alert-danger" role="alert">'+$report['password']+'</div>');	
        	}
        		if(report['email']){
        			$('#reportajaxloginstate').html('<div class="alert alert-danger" role="alert">'+$report['email']+'</div>');	

        	}
        	if(report['response']  =='success'){
        		$('#reportajaxloginstate').html('<div class="alert alert-success" role="alert">Login Successful........ </div>');
			 var i = 1;
			            setInterval(function () {
			                if(i == 0) {
			                    window.location = '/'
			                }
			                i--;
			            }, 1000);

			      }

        });
});


$('body').on('click', '#lessonstartsinglelinktostart', function(){

});

      var i = 1;
                        setInterval(function () {
                            if(i == 0) {
                                  $('.bigsuccess').fadeOut();

                                    $('.biginfo').fadeOut();
                            }
                            i--;
                        }, 1000);




/* CLOSE JQUERY */
});

/* /*/

