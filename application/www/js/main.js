'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $('.button_switch').on('click',function () {
    	$('.signup').toggleClass('flipped');
    });
  });

$(document).ready(function () {
    $('.btn_switch').on('click',function () {
    	$('.signup').addClass('flipped');
    });
  });

$(document).ready(function () {
    $('.btn_switch2').on('click',function () {
    	$('.signup').removeClass('flipped');
    });
  });

$(document).ready(function () {
        $('#sweet_order').click(function () {
    $('.par').toggleClass('flipped_order');
     });
  });


/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////
var qte;
var stck;
var result;
var price;
var name;
var id;
var idd;
var uname = [];
var oname = [];
var oprice = [];
var oqte = [];
var otprice = [];
var sum1 ;
var sum2 ;
var sum3 ;
var sum4 ;
var sum5 ;
function save(x)
	{
		stck = parseInt(x.getAttribute('data-stck'));
		qte = x.value;
		price = parseFloat(x.getAttribute('data-price'));
		if (!isNaN(qte)) 
			{
				if (qte != '') 
					{	
						if (qte > 0)
							{
								if(qte <= stck) 
									{
										result = qte*price;
									}
							}
					}
			}
	}
function check(x)
	{
		if(qte == null || isNaN(qte) || qte <= 0)
			{
				Swal.fire('bad input');
				// console.log(qte);
			}
		else if (qte > stck) 
			{
				Swal.fire('sorry we dont have that much');
			}
		else
			{
				const swalWithBootstrapButtons = Swal.mixin({
					confirmButtonClass: 'btn btn-success',
				  	cancelButtonClass: 'btn btn-danger',
				  	buttonsStyling: false,
				})

				swalWithBootstrapButtons.fire({
				  	title: 'the total price is '+result+' $',
				  	text: "confirm your order",
				  	showCancelButton: true,
				  	confirmButtonText: 'Yes, confirm order!',
				  	cancelButtonText: 'No, cancel order!',
				  reverseButtons: true
				}).then((result) => {
				  if (result.value) {
				  	// console.log(x.getAttribute('data-name'));
					stck = parseInt(x.getAttribute('data-stck'));
					
					price = parseFloat(x.getAttribute('data-price'));
					name = x.getAttribute('data-name');
					id = document.getElementById(name).value;
					idd = "qte-"+id;
					qte = document.getElementById(idd).value;
					result=qte*price;
					// console.log(qte);
					// console.log(result);
					// console.log(qte.value);
				    $.ajax(
						{
							type: 'POST',
							url: getRequestUrl()+'/panier',
							datatype: 'json',
							data: {name:name,qte:qte,price:price,result:result},
							success: function(data)
								{
									console.log(data);
									window.location.reload();
								},
							error: function (e) 
								{
									console.log('error');
								}
						
						}
					);
				  } else if (
				    // Read more about handling dismissals
				    result.dismiss === Swal.DismissReason.cancel
				  ) {
				    swalWithBootstrapButtons.fire(
				      'Cancelled',
				    )
				  }
				})
			}
	}
	
function valider()
	{
		sum1 = document.querySelectorAll(".uname");
		for (var i = 0; i < sum1.length; i++) {
		        uname.push(sum1[i].childNodes[0].nodeValue);
		}
		sum2 = document.querySelectorAll(".oname");	
		for (var i = 0; i < sum2.length; i++) {
		        oname.push(sum2[i].childNodes[0].nodeValue);
		}
		sum3 = document.querySelectorAll(".oprice");
		for (var i = 0; i < sum3.length; i++) {
		        oprice.push(sum3[i].childNodes[0].nodeValue);
		}	
		sum4 = document.querySelectorAll(".oqte");	
		for (var i = 0; i < sum4.length; i++) {
		        oqte.push(sum4[i].childNodes[0].nodeValue);
		}
		sum5 = document.querySelectorAll(".otprice");
		for (var i = 0; i < sum5.length; i++) {
		        otprice.push(sum5[i].childNodes[0].nodeValue);
		}

		// console.log(oname);
		$.ajax(
				{
					type: 'POST',
					url: getRequestUrl()+'/orders',
					datatype: 'json',
					data: {uname:uname,oname:oname,oprice:oprice,oqte:oqte,otprice:otprice},
					success: function(data)
						{
							location.reload();
						},
					error: function (e) 
						{
							console.log('error');
						}
				}
			);
	}




