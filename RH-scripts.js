$(document).ready(function(){

			$("#btntoggle1").hover(
        		function() {
            		$("#div1").stop().slideDown(); // Show the section
        		}, 
       			 function() {
           		    $("#div1").stop().slideUp(); // Hide the section when not hovering
       		 });

			// Show the section when hovering
			$("#div1").hover(
        		function() {
            		$("#div1").stop().slideDown(); // Show the section
      		  }, 
       		    function() {
                    $("#div1").stop().slideUp(); // Hide the section when not hovering
            }); 


            //cart toggle when hovering---------------------------------------------------------------------------------------------------------
			 $("#carticon").hover(function(){
				$("#cardtoggle").stop().slideDown(); // Show the login section
        		}, 
       			 function() {
           		    $("#cardtoggle").stop().slideUp(); //Hide the login section when not hovering

			});

			// Show the section when hovering
			$("#carttoggle").hover(
        		function() {
            		$("#carttoggle").stop().slideDown(); // Show the section
      		  }, 
       		    function() {
                    $("#carttoggle").stop().slideUp(); // Hide the section when not hovering
            });



            //find a pro when hovering---------------------------------------------------------------------------------------------------------
			 $("#findapro").hover(function(){
				$("#dropMenu1").stop().slideDown(); // Show the login section
        		}, 
       			 function() {
           	    $("#dropMenu1").stop().slideUp(); //Hide the login section when not hovering

			});

			// Show the section when hovering
			$("#dropMenu1").hover(
        		function() {
            		$("#dropMenu1").stop().slideDown(); // Show the section
      		  }, 
       		    function() {
                    $("#dropMenu1").stop().slideUp(); // Hide the section when not hovering
            });


            //header section close button headerClose Id -----------------------------------------------------------------------------------------
              $("#headerClose").click(
        		function() {
            		$("#header").stop().slideUp(); // Show the section
        		});

             


            //login form popup------------------------------------------------------------------------------------------------------------------

		    
		        // jQuery function to toggle the pop-up and overlay visibility

        $('#loginicon').click(function() {
            $('#background-content').addClass('blur'); // Add blur effect
            $('#overlay').show(); // Show overlay
            $('#login-form-container').show(); // Show login form
        });

        // Close the login form and remove the blur effect
        $('#close-btn, #overlay').click(function() {
            $('#background-content').removeClass('blur'); // Remove blur effect
            $('#overlay').hide(); // Hide overlay
            $('#login-form-container').hide(); // Hide login form
        });


        //register form popup----------------------------------------------------------------------------------------------------------------
        $('#toggle-btn').click(function() {
            $('#Register-popup').toggle();
            $('#Register-overlay').toggle();
            $('#login-form-container').hide(); //
        });

       
        $('#Register-overlay').click(function() {
            $('#Register-popup').hide();
            $('#Register-overlay').hide();
            $('#overlay').hide(); 
        });

        //for user menu bar------------------------------------------------------------------------------------------------------------------
         $("#userMenu").hover(function(){
            $("#dropMenu2").stop().slideDown(); // Show the user section
                }, 
                 function() {
                $("#dropMenu2").stop().slideUp(); //Hide the user section when not hovering

            });

            // Show the section when hovering
            $("#dropMenu2").hover(
                function() {
                    $("#dropMenu2").stop().slideDown(); // Show the section
              }, 
                function() {
                    $("#dropMenu2").stop().slideUp(); // Hide the section when not hovering
            });
        
        });