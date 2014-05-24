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

	}
}
