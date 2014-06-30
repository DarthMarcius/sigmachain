var nameSpaceName = "sigma";

window[nameSpaceName] = {
	checkValidEmail: function($input) {
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
			result = false;
		result = emailPattern.test($input.val());
		return result;
	},

	checkValidPassword: function($input) {
		if($input.val().length > 5) {
			return true;
		}else {
			return false;
		}
	},

	inputValuesMatch: function($input1, $input2) {
		if($input1.val() === $input2.val()) {
			return true;
		}else {
			return false;
		}
	},

	CompanyNameIsCorrect: function($input) {
		if($input.val().length > 0 && $input.val().length <= 50) {
			return true;
		}else {
			return false;
		}
	},

	CompanyDescriptionIsCorrect: function($input) {
		if(!($input.val().length > 300)) {
			return true;
		}else {
			return false;
		}
	},

	imageExtIsCorrect: function(str) {
		//var ext = str.match(/\.(.+)$/)[1];
		//console.log(str)
		//console.log((/\.(gif|jpg|jpeg|png)$/i).test(str))
		if ((/\.(gif|jpg|jpeg|png)$/i).test(str)) {  //console.log("yes")            
    		return true;
    	}else {//console.log("no")
    		return false;
    	}
	},

	inputIsValidLatitudeOrLongitude: function($input) {
		if(!isNaN($input.val())) {
			if($input.val().length > 0) {
				if($input.val() >= -180 && $input.val() <= 180) {
					return true;
				}
			}else {
				return false;
			}
		}else {
			return false;
		}
	},
	skypeNameIsValid: function($input) {
		if($input.val().length > 50) {
			return false;
		}else {
			return true;
		}
	},
	companyAddressIsValid: function($input) {
		if($input.val().length > 100) {
			return false;
		}else {
			return true;
		}
	},
	companyPhoneIsValid: function($input) {
		if($input.val().length > 50) {
			return false;
		}else {
			return true;
		}
	},
	GoogleMapsInit: function(coordinate1, coordinate2) {
		var myLatlng = new google.maps.LatLng(coordinate1, coordinate2);
	    var mapOptions = {
	        zoom: 11,
	        scrollwheel: false,
	        center: myLatlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	    var marker = new google.maps.Marker({
	        position: myLatlng,
	        map: map,
	        title: 'Dashio Admin Theme!'
	    });
	}
}

var Sigma = function() {
	this.init();
}

Sigma.prototype = {
	init: function() {

	},

	registrationListeners: function() {
		$("#company-name-input").blur(function(ev) {
			if(!sigma.CompanyNameIsCorrect($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$("#company-name-input").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.CompanyNameIsCorrect($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company name need to have at least one letter, but no more than 50."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});

		$("#company-email").blur(function(ev) {
			if(!sigma.checkValidEmail($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");

			}else {
				if($("#company-email-confirm").val().length > 0) {
					if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidEmail($("#company-email-confirm"))) {
							$("#company-email-confirm").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
			
		});

		$("#company-email").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidEmail($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Please enter a valid Email"
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#company-email-confirm").val().length > 0) {
						if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Emails you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
					//$(ev.target).tooltip("destroy");
				}
			}
			
		});

		$("#company-email-confirm").blur(function(ev) {
			if(!sigma.checkValidEmail($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#company-email").val().length > 0) {
					if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidEmail($("#company-email"))) {
							$("#company-email").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
		});

		$("#company-email-confirm").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidEmail($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Please enter a valid Email"
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#company-email").val().length > 0) {
						if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Emails you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
				}
			}
		});
// passwords validation
		$("#password").blur(function(ev) {
			if(!sigma.checkValidPassword($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#password-confirm").val().length > 0) {
					if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidPassword($("#password-confirm"))) {
							$("#password-confirm").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
			
		});

		$("#password").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidPassword($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Password needs to be at least 6 characters long."
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#password-confirm").val().length > 0) {
						if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Passwords you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
					//$(ev.target).tooltip("destroy");
				}
			}
			
		});

		$("#password-confirm").blur(function(ev) {
			if(!sigma.checkValidPassword($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#password").val().length > 0) {
					if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidPassword($("#password"))) {
							$("#password").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
		});

		$("#password-confirm").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidPassword($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Password needs to be at least 6 characters long."
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#password").val().length > 0) {
						if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Passwords you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
				}
			}
		});

		//////////
		$("#company-description").blur(function(ev) {
			if(!sigma.CompanyDescriptionIsCorrect($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$("#company-description").focus(function(ev) {
			$("#main-registration-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.CompanyDescriptionIsCorrect($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company description needs to be less than 300 characters."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});

		$("#main-registration-form").submit(function() {
			var companyNameIsCorrect = sigma.CompanyNameIsCorrect($("#company-name-input")),
				emailsMatch = sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm")),
				validEmail = sigma.checkValidEmail($("#company-email")),
				validEmailConfirm = sigma.checkValidEmail($("#company-email-confirm")),
				validPassword = sigma.checkValidPassword($("#password")),
				validPasswordConfirm = sigma.checkValidPassword($("#password-confirm")),
				passwordsMatch = sigma.inputValuesMatch($("#password"), $("#password-confirm"));

			if(!companyNameIsCorrect || !emailsMatch || !validEmail || !validEmailConfirm || !validPassword || !validPasswordConfirm || !passwordsMatch) {
				$($("div.has-error input")[0]).focus();
				return false;
			}
		});
		/*$("input").focus(function(ev) {
			$(ev.target).closest(".form-group").removeClass("has-error");
		});*/
		/////login Modal Listeners
		$("#login-button").click(function() {
			$('#myModal').modal({
				keyboard: true
			});
		});

		$("#login-form").submit(function(ev) {
			ev = $.event.fix(ev);
			ev.preventDefault();
			var email = $("#login-email").val(),
				password = $("#login-password").val();
			$.ajax({
				async: false,
				url: "/login",
				type : "POST",
				data: {email: email, password: password},
				dataType: "json",
				success: function(data) {
					$("#login-form *").tooltip("destroy");
					if(data.result != true) {
						$("#login-email").closest(".form-group").addClass("has-error");
						$("#login-password").closest(".form-group").addClass("has-error");
						$("#login-email").tooltip({
							'trigger':'manual',
							"title" : "Email and password don't match."
						});
						$("#login-email").tooltip("show");
						$("#login-email").focus();

					}else {
						$("#login-email").closest(".form-group").removeClass("has-error");
						$("#login-password").closest(".form-group").removeClass("has-error");
						window.location.href = "/company/" + data.id;
					}
				}
			});
		});

		$("#registration-thumb").click(function() {
			$.scrollTo('#registration-title', 400)
		});

		$("#login-thumb").click(function() {
			$("#login-button").click();
		});

	},

	adminListeners: function() {
		$(".form-login").submit(function(ev) {
			ev = $.event.fix(ev);
			ev.preventDefault();
			$.ajax({
				async: false,
				url: "/admin/login/step1",
				type : "POST",
				dataType: "json",
				data: {"name": $("#name").val(), "password": $("#password").val()},
				success: function(data) {
					console.log(data)
					/*$("#main-content .wrapper").html("");
					$("#main-content .wrapper").append($(data.html));
					$.ajax({
						url: "/company/owner/maps-update-live",
						type : "GET",
						dataType: "json",
						success: function(data) {
							sigma.GoogleMapsInit(data.latitude, data.longitude);
						}
					})*/
				}
			})
		});
	},

	dashboardListeners : function() {
		$(window).load(function(){
	        $.ajax({
				url: "/company/owner/maps-update-live",
				type : "GET",
				dataType: "json",
				success: function(data) {
					sigma.GoogleMapsInit(data.latitude, data.longitude);
				}
			})
    	});


		// formValidationListeners
		$(".wrapper").on("focus", "#company-latitude", function(ev) {
			$("#gps-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.inputIsValidLatitudeOrLongitude($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Latitude must be a number less than 180 and more than -180."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});

		$(".wrapper").on("blur", "#company-latitude", function(ev) {
			if(!sigma.inputIsValidLatitudeOrLongitude($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-longitude", function(ev) {
			$("#gps-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.inputIsValidLatitudeOrLongitude($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Longitude must be a number less than 180 and more than -180."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});

		$(".wrapper").on("blur", "#company-longitude", function(ev) {
			if(!sigma.inputIsValidLatitudeOrLongitude($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});
		// formValidationListeners end
    	/*owner*/
    	$(".owner-sidebar .dashboard-thumb").click(function() {//get dashboard
    		$.ajax({
				url: "/company/owner/dashboard",
				type : "GET",
				dataType: "json",
				success: function(data) {
					//console.log(data.html)
					$("#main-content .wrapper").html("");
					$("#main-content .wrapper").append($(data.html));
					$.ajax({
						url: "/company/owner/maps-update-live",
						type : "GET",
						dataType: "json",
						success: function(data) {
							sigma.GoogleMapsInit(data.latitude, data.longitude);
						}
					})
				}
			})
    	});

    	$(".owner-sidebar .profile-settigs-thumb").click(function() {//get profile
    		$.ajax({
				url: "/company/owner/profile",
				type : "GET",
				dataType: "json",
				success: function(data) {
					//console.log(data.html)
					$("#main-content .wrapper").html("");
					$("#main-content .wrapper").append($(data.html));
					initFileupload();
				}
			})
    	});
    	// profileUpdate
    	$(".wrapper").on("submit", "#gps-form",function(ev) {
    		if($("#gps-form .form-group.has-error").length == 0) {
    			if($("#company-latitude").val() == "" && $("#company-longitude").val() == "") {
    				$("#company-latitude").focus();
    			} else {//ok
		    		$.ajax({
						url: "/company/owner/profile_update/gps",
						type : "POST",
						data: {
							'latitude' : $("#company-latitude").val(),
							'longitude' : $("#company-longitude").val()
						},
						dataType: "json",
						success: function(data) {
							//console.log(data.result)
							if(data.result == "ok") {
								$('#profile-update-modal').find("p").html("You successfully updated your office location.");
								$('#profile-update-modal').modal({
									keyboard: true
								});
							}
						}
					})	
				}
    		}else {
    			$($("#gps-form .form-group.has-error")[0]).find("input").focus();
    		}
    		ev = $.event.fix(ev);
	    	ev.preventDefault();
    	});

    	$(".ok-button").click(function(ev) {
    		var id = $(ev.target).parents(".modal")[0].id;
    		$('#'+id).modal('hide');
    	});

    	function initFileupload() {
		    $("#logo-upload-form").fileupload({
			    dataType: 'json',
			    progressall: function (e, data) {
			    	var progress = parseInt(data.loaded / data.total * 100, 10);
			    	$("#logo-upload-progressbar .progress-bar").css("width", progress + "%");
			 	},
			 	submit: function (e, data) {
		    		if(!sigma.imageExtIsCorrect(data.files[0].name)) {
		    			$("#logo-upload-trigger").tooltip("destroy");
		    			$("#logo-upload-trigger").tooltip({
							'trigger':'manual',
							"title" : "File must be an image.",
							"placement" : "bottom"
						});
						$("#logo-upload-trigger").tooltip("show");
						setTimeout(function() {
							$("#logo-upload-trigger").tooltip("destroy");
						}, 5000)
		    			return false;
		    		}

		    		if(data.files[0].size >= 5000000 ) {
		    			$("#logo-upload-trigger").tooltip("destroy");
		    			$("#logo-upload-trigger").tooltip({
							'trigger':'manual',
							"title" : "File size must be less than 5mb.",
							"placement" : "bottom"
						});
						$("#logo-upload-trigger").tooltip("show");
						setTimeout(function() {
							$("#logo-upload-trigger").tooltip("destroy");
						}, 5000)
		    			return false;
		    		}
			    },
			    send: function(e, data) {
			    	$("#logo-upload-trigger").tooltip("destroy");
			    	$("#logo-upload-progressbar").show();
			    },
			    done: function (e, data) {
			    	$("#logo-upload-progressbar").hide();
			    	$("#logo-upload-progressbar .progress-bar").css("width", "0%");
			    	changeLogoLive();
			    }
		    });
	    };

	    function changeLogoLive() {
	    	$.ajax({
				url: "/company/owner/logo-update-live",
				type : "GET",
				dataType: "json",
				success: function(data) {
					var src = "../img/logos/" + data.url;
					$("#nav-accordion img, .profile-pic img").attr("src", src);
				}
			});
	    };
    	
    	$(".wrapper").on("click", "#logo-upload-trigger", function() {
    		$("#logo-upload").click();
    	});

    	// update default company data
    	// COMPANY INFORMATION
    	$(".wrapper").on("blur", "#company-name-input", function(ev) {
			if(!sigma.CompanyNameIsCorrect($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-name-input", function(ev) {
			$("#company-info-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.CompanyNameIsCorrect($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company name need to have at least one letter, but no more than 50."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});
		$(".wrapper").on("blur", "#company-description", function(ev) {
			if(!sigma.CompanyDescriptionIsCorrect($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-description", function(ev) {
			$("#company-info-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.CompanyDescriptionIsCorrect($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company description needs to be less than 300 characters."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});

		$(".wrapper").on("submit", "#company-info-form", function(ev) {
			//console.log($("#company-description").val())
			if($("#company-info-form .form-group.has-error").length == 0) {
    			if($("#company-name-input").val() == "" && $("#company-description").val() == "") {
    				$("#company-name-input").focus();
    			} else {//ok
		    		$.ajax({
						url: "/company/owner/profile_update/info",
						type : "POST",
						data: {
							'name' : $("#company-name-input").val(),
							'country' : $("#country-name-input").val(),
							'description' : $("#company-description").val()
						},
						dataType: "json",
						success: function(data) {
							if(data.result == "ok") {
								$('#profile-update-modal p').html("You updated your company info successfuly");
								$.ajax({
									url: "/company/owner/name-update-live",
									type : "GET",
									dataType: "json",
									success: function(data) {
										var name = data.name;
										$("#nav-accordion h5").html(name);
									}
								})	
								$('#profile-update-modal').modal({
									keyboard: true
								});
								$('#profile-update-modal').modal("show");
							}
						}
					})	
				}
    		}else {
    			$($("#company-info-form .form-group.has-error")[0]).find("input").focus();
    		}
			ev = $.event.fix(ev);
	    	ev.preventDefault();
		});
		// COMPANY INFORMATION END
		// CONTACT INFORMATION
		$(".wrapper").on("blur", "#company-address1", function(ev) {
			if(!sigma.companyAddressIsValid($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-address1", function(ev) {
			$("#contact-info-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.companyAddressIsValid($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company address should have no more than 100 characters."
					});
					$(ev.target).tooltip("show");
				}
			}
		});

		$(".wrapper").on("blur", "#company-phone", function(ev) {
			if(!sigma.companyPhoneIsValid($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-phone", function(ev) {
			$("#contact-info-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.companyPhoneIsValid($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company phone can not have more than 50 characters."
					});
					$(ev.target).tooltip("show");
				}
			}
		});

		$(".wrapper").on("blur", "#company-skype", function(ev) {
			if(!sigma.skypeNameIsValid($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}
		});

		$(".wrapper").on("focus", "#company-skype", function(ev) {
			$("#contact-info-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.skypeNameIsValid($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Company skype can not have more than 50 characters."
					});
					$(ev.target).tooltip("show");
				}
			}
		});

		$(".wrapper").on("submit", "#contact-info-form", function(ev) {
			if($("#contact-info-form .form-group.has-error").length == 0) {
    			if($("#company-address1").val() == "" && $("#company-phone").val() == "" && $("#company-skype").val() == "") {
    				$("#company-address1").focus();
    			} else {//ok
		    		$.ajax({
						url: "/company/owner/profile_update/contact-info",
						type : "POST",
						data: {
							'address' : $("#company-address1").val(),
							'phone' : $("#company-phone").val(),
							'skype' : $("#company-skype").val()
						},
						dataType: "json",
						success: function(data) {
							//console.log(data.result)
							if(data.result == "ok") {
								$('#profile-update-modal p').html("You updated your company contact info successfuly");
								$('#profile-update-modal').modal({
									keyboard: true
								});
								$('#profile-update-modal').modal("show");
							}
						}
					})	
				}
    		}else {
    			$($("#contact-info-form .form-group.has-error")[0]).find("input").focus();
    		}
			ev = $.event.fix(ev);
	    	ev.preventDefault();
		});
		// CONTACT INFORMATION END
		// CHANGE PASSWORD
		$(".wrapper").on("blur", "#old-password", function(ev) {
			if(!sigma.checkValidPassword($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if(sigma.checkValidPassword($("#password-confirm"))) {
					$("#password-confirm").closest(".form-group").removeClass("has-error");
				}
			}
			
		});

		$(".wrapper").on("focus", "#old-password", function(ev) {
			$("#change-password-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidPassword($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Password needs to be at least 6 characters long."
					});
					$(ev.target).tooltip("show");
				}
			}
			
		});
		/////////
		$(".wrapper").on("blur", "#password", function(ev) {
			if(!sigma.checkValidPassword($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#password-confirm").val().length > 0) {
					if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidPassword($("#password-confirm"))) {
							$("#password-confirm").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
			
		});

		$(".wrapper").on("focus", "#password", function(ev) {
			$("#change-password-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidPassword($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Password needs to be at least 6 characters long."
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#password-confirm").val().length > 0) {
						if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Passwords you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
					//$(ev.target).tooltip("destroy");
				}
			}
			
		});

		$(".wrapper").on("blur", "#password-confirm", function(ev) {
			if(!sigma.checkValidPassword($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#password").val().length > 0) {
					if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidPassword($("#password"))) {
							$("#password").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
		});

		$(".wrapper").on("focus", "#password-confirm", function(ev) {
			$("#change-password-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidPassword($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Password needs to be at least 6 characters long."
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#password").val().length > 0) {
						if(!sigma.inputValuesMatch($("#password"), $("#password-confirm"))) {//if passwords dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Passwords you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
				}
			}
		});

		$(".wrapper").on("submit", "#change-password-form", function(ev) {
			if($("#change-password-form .form-group.has-error").length == 0) {
    			if($("#old-password").val() == "" && $("#password").val() == "" && $("#password-confirm").val() == "") {
    				$("#old-password").focus();
    			} else {//ok
		    		$.ajax({
						url: "/company/owner/profile_update/password",
						type : "POST",
						data: {
							'oldPassword' : $("#old-password").val(),
							'password' : $("#password").val(),
							'confirmPassword' : $("#password-confirm").val()
						},
						dataType: "json",
						success: function(data) {
							console.log(data)
							if(data.result == "ok") {
								$('#profile-update-modal p').html("You have updated your company password successfuly");
								$('#profile-update-modal').modal({
									keyboard: true
								});
								$('#profile-update-modal').modal("show");
							}
							if(data.result == "wrong old password") {
								$('#profile-update-modal p').html("Old password you entered is not right, please try again.");
								$('#profile-update-modal').modal({
									keyboard: true
								});
								$('#profile-update-modal').modal("show");
							}
						}
					})	
				}
    		}else {
    			$($("#change-password-form .form-group.has-error")[0]).find("input").focus();
    		}
			ev = $.event.fix(ev);
	    	ev.preventDefault();
		});
		// CHANGE PASSWORD END
		// CHANGE EMAIL
		$(".wrapper").on("blur", "#company-email", function(ev) {
			if(!sigma.checkValidEmail($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");

			}else {
				if($("#company-email-confirm").val().length > 0) {
					if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidEmail($("#company-email-confirm"))) {
							$("#company-email-confirm").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
			
		});

		$(".wrapper").on("focus", "#company-email", function(ev) {
			$("#change-email-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidEmail($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Please enter a valid Email"
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#company-email-confirm").val().length > 0) {
						if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Emails you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
					//$(ev.target).tooltip("destroy");
				}
			}
			
		});

		$(".wrapper").on("blur", "#company-email-confirm", function(ev) {
			if(!sigma.checkValidEmail($(ev.target))) {
				$(ev.target).closest(".form-group").addClass("has-error");
			}else {
				if($("#company-email").val().length > 0) {
					if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
						$(ev.target).closest(".form-group").addClass("has-error");
					}else {//but if they match
						if(sigma.checkValidEmail($("#company-email"))) {
							$("#company-email").closest(".form-group").removeClass("has-error");
						}
					}
				}
			}
		});

		$(".wrapper").on("focus", "#company-email-confirm", function(ev) {
			$("#change-email-form *").tooltip("destroy");
			if($(ev.target).closest(".form-group").hasClass("has-error")) {
				$(ev.target).closest(".form-group").removeClass("has-error");
				if(!sigma.checkValidEmail($(ev.target))) {
					$(ev.target).tooltip({
						'trigger':'manual',
						"title" : "Please enter a valid Email"
					});
					$(ev.target).tooltip("show");
				}else {
					if($("#company-email").val().length > 0) {
						if(!sigma.inputValuesMatch($("#company-email"), $("#company-email-confirm"))) {//if emails dont match
							$(ev.target).tooltip({
								'trigger':'manual',
								"title" : "Emails you entered does not match, please try again"
							});
							$(ev.target).tooltip("show");
						}
					}
				}
			}
		});
		$(".wrapper").on("submit", "#change-email-form", function(ev) {
			if($("#change-email-form .form-group.has-error").length == 0) {
    			if($("#company-email").val() == "" && $("#company-email-confirm").val() == "") {
    				$("#company-email").focus();
    			} else {//ok
		    		$.ajax({
						url: "/company/owner/profile_update/email",
						type : "POST",
						data: {
							'email' : $("#company-email").val(),
							'emailConfirm' : $("#company-email-confirm").val()
						},
						dataType: "json",
						success: function(data) {
							//console.log(data.result)
							if(data.result == "ok") {
								$('#profile-update-modal p').html("You have updated your company email successfuly");
								$('#profile-update-modal').modal({
									keyboard: true
								});
								$('#profile-update-modal').modal("show");
							}
						}
					})	
				}
    		}else {
    			$($("#change-email-form .form-group.has-error")[0]).find("input").focus();
    		}
			ev = $.event.fix(ev);
	    	ev.preventDefault();
		});
		// CHANGE EMAIL END
		// LOGOUT
		$(".logout").click(function() {
			$.ajax({
				url: "/company/dashboard/logout",
				type : "POST",
				dataType: "json",
				success: function(data) {
					//console.log(data.result)
					if(data.result == "ok") {
						window.location.href = "/";
					}
				}
			})	
		});
		// LOGOUT END

		// SEARCH
		$("body").on("click", ".search-for-companies-thumb", function() {
			$.ajax({
				url: "/company/search/companies",
				type : "GET",
				dataType: "json",
				success: function(data) {//console.log(data.html)
					$(".wrapper").html(data.html);
				}
			});
		});

		$("body").on("click", ".search-test-panel tbody tr", function(ev) {
			var companyThumb = $(ev.target).closest("tr"),
				redirectLink = companyThumb.attr("data-link");
			console.log(redirectLink)
			window.location.href = redirectLink;

		});
		// SEARCH END
    	// update default company data end
    	/*owner end*/
	}
}
