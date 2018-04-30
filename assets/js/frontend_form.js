(function( $ ) {
	'use strict';

	 $(document).ready(function($) {

	 		$(function(){
				$(".date-picker").datepicker({
					dateFormat: 'mm/dd/yy',
					prevText: '<i class="fa fa-caret-left"></i>',
					nextText: '<i class="fa fa-caret-right"></i>'
				});
			});

			 var international_card = false;
			 if( $('#rave-vamount').length ){
			 	var amountField = $('#rave-vamount');
			 	calculateTotal();
		     	
			}else{
				var amountField = $('#rave-amount');
		     
			}
		     var max = 10;
		     amountField.keydown(function(e) {
		         format_validate(max, e);
		     });

		     function format_validate(max, e) {
		         var value = amountField.text();
		         if (e.which != 8 && value.length > max) {
		             e.preventDefault();
		         }
		         // Allow: backspace, delete, tab, escape, enter and .
		         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		             // Allow: Ctrl+A
		             (e.keyCode == 65 && e.ctrlKey === true) ||
		             // Allow: Ctrl+C
		             (e.keyCode == 67 && e.ctrlKey === true) ||
		             // Allow: Ctrl+X
		             (e.keyCode == 88 && e.ctrlKey === true) ||
		             // Allow: home, end, left, right
		             (e.keyCode >= 35 && e.keyCode <= 39)) {
		             // let it happen, don't do anything
		             calculateFees();
		             return;
		         }
		         // Ensure that it is a number and stop the keypress
		         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		             e.preventDefault();
		         } else {
		             calculateFees();
		         }
		     }


			$.fn.digits = function(){
			    return this.each(function(){
			        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
			    })
			}
			function calculateTotal(){
					if( $('#rave-vamount').length ){
					 	var amountField = $('#rave-vamount');
				     	
					}else{
						var amountField = $('#rave-quantityamount');
				     
					}
				 	var unit = amountField.val();
				 	var quant = $('#rave-quantity').val();

				 	if (quant == '' || quant == null) {
				 		quant =  1;
				 	}
				 	var newvalue = unit * quant;
				 	$('#rave-amount').val(newvalue);
				}
		     function calculateFees(transaction_amount) {
		         setTimeout(function() {
		         	transaction_amount = transaction_amount || parseInt(amountField.val());
		         	if( $('#rave-vamount').length ){
					 	var name = $('#rave-vamount option:selected').attr('data-name');
			 			$('#rave-vname').val(name);
					}
     				 var multiplier = 0.015;
					 var fees = multiplier * transaction_amount;
					 var extrafee = 0;
					 if (fees > 2000) {
						 var fees = 2000;
					 }else{
						 if (transaction_amount > 2500) {fees += 100};
					 }
					 var total = transaction_amount + fees;
								//  console.log(transaction_amount);
		             if (transaction_amount == '' || transaction_amount == 0 || transaction_amount.length == 0 || transaction_amount == null || isNaN (transaction_amount)) {
						 var total = 0;
						 var fees = 0;
					 }
					 $(".rave-txncharge").hide().html("NGN"+fees.toFixed(2)).show().digits();
					 $(".rave-txntotal").hide().html("NGN"+total.toFixed(2)).show().digits();
		         }, 100);
		     }

		     calculateFees();

			$('.rave-number').keydown(function(event) {
		       if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
		           || event.keyCode == 27 || event.keyCode == 13
		           || (event.keyCode == 65 && event.ctrlKey === true)
		           || (event.keyCode >= 35 && event.keyCode <= 39)){
		               return;
		       }else{
		           if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
		               event.preventDefault();
		           }
		       }
		   	});
			$('#rave-quantity,#rave-vamount').on('change', function() {

			 	calculateTotal();
				
			 	calculateFees();
			});
		 	function validateEmail(email) {
			  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			  return re.test(email);
			}
		 	$('.rave-form').on('submit', function(e) {
				var stop = false;
				e.preventDefault();
				
				$("#rave-agreementicon").removeClass('rerror');
					
				$(this).find("input,select, textarea").each(function() {
						$(this).removeClass('rerror');//.css({ "border-color":"#d1d1d1" });
				});
				var email = $(this).find("#rave-email").val();
				var amount = $(this).find("#rave-amount").val();
				if (Number(amount) > 0) {
				}else{
					$(this).find("#rave-amount,#rave-vamount").addClass('rerror');//  css({ "border-color":"red" });
					$('html,body').animate({ scrollTop: $('.rerror').offset().top - 110 }, 500);
					return false;
				}
				if (!validateEmail(email)) {
			    $(this).find("#rave-email").addClass('rerror');//.css({ "border-color":"red" });
					$('html,body').animate({ scrollTop: $('.rerror').offset().top - 110 }, 500);
					return false;
            		stop = true;

				}
				$(this).find("input, select, textarea").filter("[required]").filter(function() { return (this.value == '' || this.value == null); }).each(function() {
            		$(this).addClass('rerror');
            		$('html,body').animate({ scrollTop: $('.rerror').offset().top - 110 }, 500);
            		stop = true;
					return true;
				});
				if($('#rave-agreement').length){
					if($("#rave-agreement").is(':checked')){
						stop = false;
					}else{
						$("#rave-agreementicon").addClass('rerror');
						stop = true;
					}
					if (stop) {
						$('html,body').animate({ scrollTop: $('.rerror').offset().top - 110 }, 500);
						return false;

					}
				
				}
				if (stop) {
					$('html,body').animate({ scrollTop: $('.rerror').offset().top - 110 }, 500);
					return false;

				}


	 		 	var self = $(this);
				var $form = $(this);

				$('#rave-form-loader').show();
				var formdata = new FormData(this);

				$.ajax({
				     url: $form.attr('action'),
				     type: "POST",
				     data: formdata,
				     mimeTypes:"multipart/form-data",
				     contentType: false,
				     cache: false,
				     processData: false,
					 dataType:"JSON",
				     success: function(data){
						$('#rave-form-loader').hide();
						
						if (data.result == 'success'){
							var names = data.name.split(' ');
							var firstName = names[0] || "";
							var lastName = names[1] || "";
							var quantity =data.quantity;
							if (data.plan == 'none' || data.plan == ''  || data.plan == 'no' ) {
								var popup = getpaidSetup({
							      PBFPubKey: data.key,
							      customer_email: data.email,
							      customer_firstname: firstName,
							      customer_lastname: lastName,
							      amount: data.total/100,
							      currency: data.currency,
							      txref : data.reference,
							      country : data.country,
							      onclose: function() {},
							      callback: function(response) {
							        var flw_ref = response.tx.flwRef;
							        // console.log("This is the response returned after a charge", response);
							        if ( response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0" ) {
							        	popup.close();
							  			$('#rave-form-loader').show();
											$.post($form.attr('action'), {
												'action':'kkd_pff_rave_confirm_payment',
												'reference':response.tx.txRef,
												'quantity':quantity,
												'flwReference':flw_ref,

											}, function(newdata) {
				 									data = JSON.parse(newdata);
				 									if (data.result == 'success2'){
								                       window.location.href = data.link;
								                    }
				 									if (data.result == 'success'){
				 										$('.rave-form')[0].reset();
				 										$('html,body').animate({ scrollTop: $('.rave-form').offset().top - 110 }, 500);

				 										// self.before('<pre>'+data.message+'</pre>');
				 										$('.rave-form-header').after('<div class="alert alert-success"><button type="button" aria-hidden="true" class="close">×</button> <span>'+data.message+'</span></div>')
				 										$(this).find("input, select, textarea").each(function() {
				 												$(this).css({ "border-color":"#d1d1d1","background-color":"#fff" });
				 										});
														$(".rave-txncharge").hide().html("NGN0").show().digits();
														$(".rave-txntotal").hide().html("NGN0").show().digits();

				 										$('#rave-form-loader').hide();
													}else{
				 										// self.before('<pre>'+data.message+'</pre>');
				 										$('.rave-form-header').after('<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button> <span>'+data.message+'</span></div>')
				 										$('#rave-form-loader').hide();
				 									}
				 							});
							        }else{
							        	$('#rave-form-loader').show();
										
							          	alert(response.respmsg);
							        }
							      }
							    });
							}else{
								var popup = getpaidSetup({
							      PBFPubKey: data.key,
							      customer_email: data.email,
							      customer_firstname: firstName,
							      customer_lastname: lastName,
							      amount: data.total/100,
							      currency: data.currency,
							      payment_plan: data.plan,
							      txref : data.reference,
							      country : data.country,
							      onclose: function() {},
							      callback: function(response) {
							        var flw_ref = response.tx.flwRef;
							        // console.log("This is the response returned after a charge", response);
							        if ( response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0" ) {
							        	popup.close();
							  			$('#rave-form-loader').show();
											$.post($form.attr('action'), {
												'action':'kkd_pff_rave_confirm_payment',
												'reference':response.tx.txRef,
												'quantity':quantity,
												'flwReference':flw_ref,

											}, function(newdata) {
				 									data = JSON.parse(newdata);
				 									if (data.result == 'success2'){
								                       window.location.href = data.link;
								                    }
				 									if (data.result == 'success'){
				 										$('.rave-form')[0].reset();
				 										$('html,body').animate({ scrollTop: $('.rave-form').offset().top - 110 }, 500);

				 										// self.before('<pre>'+data.message+'</pre>');
				 										$('.rave-form-header').after('<div class="alert alert-success"><button type="button" aria-hidden="true" class="close">×</button> <span>'+data.message+'</span></div>')
				 										$(this).find("input, select, textarea").each(function() {
				 												$(this).css({ "border-color":"#d1d1d1","background-color":"#fff" });
				 										});
														$(".rave-txncharge").hide().html("NGN0").show().digits();
														$(".rave-txntotal").hide().html("NGN0").show().digits();

				 										$('#rave-form-loader').hide();
													}else{
				 										// self.before('<pre>'+data.message+'</pre>');
				 										$('.rave-form-header').after('<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button> <span>'+data.message+'</span></div>')
				 										$('#rave-form-loader').hide();
				 									}
				 							});
							        }else{
							        	$('#rave-form-loader').show();
										
							          	alert(response.respmsg);
							        }
							      }
							    });
							}

			 				
			 			}else{
							alert(data.message);
						}
					}

			    });
			});
			
});
})( jQuery );
