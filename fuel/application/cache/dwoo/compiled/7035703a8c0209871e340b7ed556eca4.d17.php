<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> 
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	
	
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <!--__FUEL_MARKER__0-->Pricing Page Title    </title>
    	
	
	<meta name="title" content="Pricing Meta Title">
    <meta name="keywords" content="">
    <meta name="description" content="Pricing Meta Description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">
    <link rel="icon" href="/assets/img/favicon/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/assets/img/favicon/apple-touch-icon.png">

    <link rel="stylesheet" href="https://www.medicspot.co.uk/assets/css/site.normalize.css">
    <link rel="stylesheet" href="https://www.medicspot.co.uk/assets/css/custom.css">
    <link rel="stylesheet" href="https://www.medicspot.co.uk/assets/css/site.booking.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.medicspot.co.uk/assets/css/slick.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4258414.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&libraries=places,geometry" type="text/javascript"></script>

    


    <script language="javascript">
        var globals = { };
        function getLocation() { 
            if (navigator.geolocation) { 
                navigator.geolocation.getCurrentPosition(showPosition, function(failure){ 
                    console.log(failure.message);
                });
            } else { 
                
            }
        }
        function showPosition(position) { 
            jQuery('#lat').val(position.coords.latitude);
            jQuery('#lng').val(position.coords.longitude);
            globals.lat = position.coords.latitude;
            globals.lng = position.coords.longitude;

            booking_Map();
        }

        $( document ).ready(function() { 

            booking_Map();

            getLocation();
        });
    </script>
    <script src="https://www.medicspot.co.uk/assets/js/site.main.js" defer></script>
    <script src="https://www.medicspot.co.uk/assets/js/moment-with-locales.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102975050-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-102975050-1');
    </script>
<script>
    (function(h,o,t,j,a,r){ 
        h.hj=h.hj||function(){ (h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={ hjid:754624,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><script>window.jQuery || document.write('<script src="/assets/js/jquery.js?c=-62169984000"><\/script>');</script>
    <script>
        !function(f,b,e,v,n,t,s)
        { if(f.fbq)return;n=f.fbq=function(){ n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '355555998205448');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=355555998205448&ev=PageView&noscript=1"  /></noscript>

    <script>(function(w,d,s,l,i){ w[l]=w[l]||[];w[l].push({ 'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7XJWFH');</script>
	<script>
		window.intercomSettings = { 
			app_id: "bj6zgv4a"
		};
	</script>
	
	<script>(function(){ var w=window;var ic=w.Intercom;if(typeof ic==="function"){ ic('reattach_activator');ic('update',intercomSettings);}else{ var d=document;var i=function(){ i.c(arguments)};i.q=[];i.c=function(args){ i.q.push(args)};w.Intercom=i;function l(){ var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/bj6zgv4a';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){ w.attachEvent('onload',l);}else{ w.addEventListener('load',l,false);}}})()</script>
	</head>

<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7XJWFH"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<header id="page-header">
    <div class="container">
        <div class="page-header-wrapper">
            <a href="https://www.medicspot.co.uk/" class="page-logo" title="Medicspot" style="background: url('https://www.medicspot.co.uk/assets/images/logo-ms.png');    background-size: 15.2rem 4.8rem;">Medicspot</a>
            <nav class="nav-main">
                <div class="mobile-menu-header">
                    <a href="/" class="page-logo" title="Medicspot">Medicspot</a>
                    <button id="close-menu" title="Close Menu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                                <a href="javascript:void(0);" id="NEEDHELP">NEED HELP?</a>
                <a href="https://www.medicspot.co.uk/pricing" class="active">Pricing</a>
                <a href="https://www.medicspot.co.uk/how-it-works" >How it works</a>
                <a href="https://www.medicspot.co.uk/our-clinics"  class="btn bokNowbtn">Book Now</a>

            </nav>
            <button id="show-menu" title="Show Menu">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
</header>
	<header id="page-header-two" style='display:none'>
        <div class="container">
            <div class="page-header-wrapper">
                <ul>
                    <li><a href="javascript:void(0)" class="actHead " id="headReviw">Reviews <i class="fa fa-star-o"></i></a></li>
                    <li><a href="javascript:void(0)" class="actHead " id="headBook">Book <i class="fa fa-map-marker"></i></a></li>
                    <li><a href="javascript:void(0)" class="actHead " id="headClinic">Info <i class="fa fa-question-circle"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
<style type="text/css">
.modal {
    display: none; 
    position: fixed; 
    z-index: 99999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
}
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 50%; 
    display: flow-root !important;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    line-height: 14px;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
} 
#NEEDHELP_MODEL .title{
    font-size: 19px;
    line-height: 1.5;
    letter-spacing: .2px;
    color: #000;
}
#NEEDHELP_MODEL .text{
    font-size: 15px;
    line-height: 1.5;
    letter-spacing: .2px;
    color: #000;
}
#NEEDHELP_MODEL .columns{
    width: 100%;
    display: block;
    float: left;
}
#NEEDHELP_MODEL .block{
    display: inline-block;
    text-align: center;
    margin-top: 30px;
}
#NEEDHELP_MODEL .block.one{
    width: 31%;
}
#NEEDHELP_MODEL .block.two{
    width: 41%;
}
#NEEDHELP_MODEL .block.three{
    width: 26%;
}
#NEEDHELP_MODEL .block img{
    display: block;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 25px;
}
#NEEDHELP_MODEL .block .btn{
    display: inline-block;
    text-align: center;
    background: #6d56ee;
    color: #ffffff;
    border-radius: .4rem;
    font-size: 1.4rem;
    line-height: 3.4rem;
    padding: 0 2.2rem;
    transition: transform .3s ease-out;
}
#NEEDHELP_MODEL .block .btn:hover {
    background-color: #03d7a8;
    color: #ffffff;
    transform: scale(1);
}

@media (min-width: 241px) and (max-width: 767px){
    .modal-content {
        padding: 15px 12px;
        width: 92%;
        margin: 25% auto;
    }
    #NEEDHELP_MODEL .title {
        font-size: 14px;
        letter-spacing: .1px;
        font-weight: bold;
    }
    #NEEDHELP_MODEL .text {
        font-size: 13px;
        line-height: 1.2;
        letter-spacing: 0.1px;
        margin-top: 5px;
    }
    #NEEDHELP_MODEL .block img {
        margin-bottom: 15px;
        width: 30px;
    }
    #NEEDHELP_MODEL .block .btn {
        font-size: 8px;
        line-height: 3.0rem;
        padding: 0 0.7rem;
    }
    #NEEDHELP_MODEL .block .btn:hover {
        transform: scale(1);
    }
    #NEEDHELP_MODEL .block.one {
        width: 33%;
    }
    #NEEDHELP_MODEL .block.two {
        width: 37.5%;
    }
    #NEEDHELP_MODEL .block.three {
        width: 27%;
    }
}
@media (min-width: 768px) and (max-width: 991px){
    .modal-content {
        width: 65%;
    }
    #NEEDHELP_MODEL .block .btn {
        font-size: 1.36rem;
        line-height: 3.4rem;
        padding: 0 1.4rem;
    }
    #NEEDHELP_MODEL .text {
        font-size: 14px;
        line-height: 1.3;
        letter-spacing: .1px;
    }
    #NEEDHELP_MODEL .block img {
        width: 45px;
    }
}
</style>
	<script type="text/javascript">
        function openChat() { 
            $("#NEEDHELP_MODEL").css("display" , "none");
            Intercom('show');
        }  
    </script>

<div id="NEEDHELP_MODEL" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 class="title">Thanks Your For Visiting MedicSpot</h2>
    <p class="text">Have a question about our service or what our doctors can do for you? Contact us below.</p>
    <div class="block one">
        <img src="https://www.medicspot.co.uk/assets/images/client_msg.png" alt="Chat with MedicSpot icon" />
        <a href="javascript:void(0);" onclick="openChat();return false;" class="btn chatteam" id="chatteam">Chat With Our Team</a>
    </div>
    <div class="block two">
        <img src="https://www.medicspot.co.uk/assets/images/client_email.png" alt="Call MedicSpot icon" />
        <a href="mailto:info@medicspot.co.uk" class="btn">info@medicspot.co.uk</a>
    </div>
    <div class="block three">
        <img src="https://www.medicspot.co.uk/assets/images/client_call.png" alt="Call MedicSpot icon" />
        <a href="callto:020 3637 8398" class="btn">020 3637 8398</a>
    </div>
  </div>
</div>	
<page id="pricing">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1>MedicSpot Pricing</h1>
				<p class="subtitle">
				<!--__FUEL_MARKER__1-->MedicSpot provides excellent healthcare at affordable prices. Get quick and convenient access to our expert GPs.				</p>
			</div>
			<div class="content">
				<div class="pricing-list">
					<div class="pricing-package">
						<h3>Pay Monthly</h3>
						<div class="package-price">
						
							<div class="price-sum">£<!--__FUEL_MARKER__2-->13</div>
							<div class="price-per">per month</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<!--__FUEL_MARKER__3--><ul class="package-features">
<li>UK Expert GPs</li>
<li>Sick Notes</li>
<li>No Doctor Prescription Fees</li>
<li>Unlimited GP Consultations</li>
</ul>					</div>
					<div class="pricing-package">
						<h3>Single Consultation</h3>
						<div class="package-price">
							<div class="price-sum">£<!--__FUEL_MARKER__4-->39</div>
							<div class="price-per">One off</div>
						</div>
						<a href="/" class="btn">Book Now</a>
						<!--__FUEL_MARKER__5--><ul class="package-features">
<li>UK Expert GPs</li>
<li>Sick Notes</li>
<li>No Doctor Prescription Fees</li>
</ul>					</div>
					<div class="pricing-package">
						<h3>Pay Annually</h3>
						<div class="package-price">
							<div class="price-sum">£<!--__FUEL_MARKER__6-->130</div>
							<div class="price-per">per year</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<!--__FUEL_MARKER__7--><ul class="package-features">
<li>UK Expert GPs</li>
<li>Sick Notes</li>
<li>No Doctor Prescription Fees</li>
<li>Unlimited GP Consultations</li>
<li>Free Travel Health Advice</li>
<li>Free Private Annual Flu Jab</li>
</ul>					</div>
				</div>
				<div class="pricing-disclaimer">
					Our private GP services are available on either a pay as you go or pay monthly plan.
				</div>
			</div>
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				


	<img src="https://www.medicspot.co.uk/assets/images/logo/logo-st.png" title="Secure &amp; trusted" alt="Secure and trusted logo" >
	<img src="https://www.medicspot.co.uk/assets/images/logo/logo-gmc.png" title="General Medical Council" alt="General Medical Council logo" >
	<img src="https://www.medicspot.co.uk/assets/images/logo/logo-ico.png" title="Information Commissionerâ€™s Office" alt="ICO logo" >
	<img src="https://www.medicspot.co.uk/assets/images/logo/logo-cqc.png" title="CareQuality Commission" alt="Care Quality Commission logo" >			</div>
		</div>
	</section>
</page>

	
		<footer id="page-footer">
			<div class="container">
				<nav id="page-quick-access">
					<section>
						<h3>How we help you</h3>
						<ul>
							<li><a href="https://www.medicspot.co.uk/how-it-works">How it works</a></li>
							<li><a href="https://www.medicspot.co.uk/what-we-treat">What we treat</a></li>
							<li><a href="https://www.medicspot.co.uk/team">About us</a></li>
							<li><a href="https://www.medicspot.co.uk/faq">FAQ</a></li>
							<li><a href="https://www.medicspot.co.uk/contact">Contact Us</a></li>
						</ul>
					</section>
					<section>
						<h3>What we offer</h3>
						<ul>
							<li><a href="https://www.medicspot.co.uk/our-clinics">Our clinics</a></li>
							<li><a href="https://www.medicspot.co.uk/pricing">Pricing</a></li>
							<li><a href="https://www.medicspot.co.uk/reviews">Reviews</a></li>
							<li><a href="https://www.medicspot.co.uk/blog">Blog</a></li>
							<li><a href="https://www.medicspot.co.uk/press">Press</a></li>
						</ul>
					</section>
					<section>
						<h3>Partners</h3>
						<ul>
							<li><a href="https://www.medicspot.co.uk/pharmacies">For Pharmacy</a></li>
							<li><a href="https://www.medicspot.co.uk/businesses">For Business</a></li>
							<li><a href="https://www.medicspot.co.uk/for-doctors">For Doctors</a></li>
						</ul>
					</section>
				</nav>

				<div id="page-social">
					<a href="#top" class="page-logo" title="Medicspot">Medicspot</a>
					<nav class="nav-social">
						<a href="https://twitter.com/medicspot_uk" target="_blank" title="Twitter"><i class="zmdi fa fa-twitter"></i></a>
						<a href="https://www.facebook.com/medicspotuk/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
						<a href="https://www.linkedin.com/company/17946635/" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
					</nav>
				</div>
			</div>
			
			<div id="page-legal">
				<div class="container">
					<a href="https://www.medicspot.co.uk/terms" target="_blank">Terms & Conditions</a>
					<a href="https://www.medicspot.co.uk/privacy" target="_blank">Privacy &amp; Cookies Policy</a>
					<div>Medicspot Limited is registered in England at 93 Elizabeth Court, London, NW1 6EJ Registered No. 10089666. © 2017</div>

					<div id="mhra-fmd-placeholder" style="text-align: right;">
						<a href="https://medicine-seller-register.mhra.gov.uk/search-registry/649" target="_blank">
							<img src="https://www.medicspot.co.uk/assets/images/mhra.png" style="width:90px;" alt="Verification icon" >
						</a>
					</div>

				</div>
			</div>
		</footer>
		    <div id="cookie-bar" class="fixed">
        <p>This website uses cookies to ensure you get the best experience on our website
            <a href="privacy" class="cb-policy">Find out more</a>
            <a href="javascript:;" id="cookie_stop" class="cb-ok">OK</a>
        </p>
    </div>
	</body>
<script>
    $(function () { 
        $('#cookie_stop').click(function () { 
            $('#cookie-bar').slideUp();

            var nDays = 999;
            var cookieName = "disclaimer";
            var cookieValue = "true";

            var today = new Date();
            var expire = new Date();
            expire.setTime(today.getTime() + 3600000 * 24 * nDays);
            document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + ";path=/";
        });

    });
</script>
<style>
    #cookie-bar {
        position: fixed;
        bottom: 0px;
        background-color: #000;
        padding: 10px;
        color: #fff;
        width: 100%;
        display: block;
        left: 0px;
        right: 0px;
        text-align: center;
    }

    .cb-ok {
        margin-left: 10px;
        border: 1px solid #fff;
        border-radius: 10%;
        padding: 2px 20px;
    }

    .cb-policy {
        text-decoration: underline;
    }
</style>
	<script language="javascript">
	$( document ).ready(function() { 
		if (typeof clinic_id !== "undefined") { 
			if(clinic_id!=''){ 
				booking_Map();
				loadClinicData(clinic_id, '');

				booking_SelectEstablishment();
				getAppointmentTimes(clinic_id, '24-04-2018');	
			}else{ 
				if ($('.booking-map').length) { 
					booking_Map();
				}
			}
		}
	});
		var modal = document.getElementById('NEEDHELP_MODEL');

		var btn = document.getElementById("NEEDHELP");

		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() { 
		    modal.style.display = "block";
		}

		span.onclick = function() { 
		    modal.style.display = "none";
		}

		window.onclick = function(event) { 
		    if (event.target == modal) { 
		        modal.style.display = "none";
		    }
		}
	</script>
	<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ 
			 $('#NEEDHELP').click(function(e) { 
		        e.preventDefault();
		        $('body').removeClass('menu-shown');
		    });
		});
	</script>	
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>