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
        <!--__FUEL_MARKER__0-->Blog    </title>
    	
	
	<meta name="title" content="Blog Meta Title">
    <meta name="keywords" content="">
    <meta name="description" content="">
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
                <a href="https://www.medicspot.co.uk/pricing" >Pricing</a>
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
</div><div class="blog-background"></div>

<page id="blog-index">
	<section id="blog-index-header" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1>MedicSpot Blog</h1>
			</div>
		</div>
	</section>

	<section id="blog-article-list">
		<div class="container">
				<div class="article-list">
										<a href="https://www.medicspot.co.uk/article/navigating-through-sick-notes">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/medicspot_sick_note.png);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>Navigating Through Sick Notes</h3>
								<h4><strong>Dr Zubair Ahmed</strong></h4>
								<h4 style="margin-top: 10px"><strong>
									04/01/2018									</strong></h4>
								<p>
									Navigating through sick notes, fit notes, doctors notes, med3s &ndash; whatever you call them &ndash; can get quite complicated especially if you&rsquo;ve been fortunate enough never to need them.  It can be difficult enough to jump through hoops to figure out if you need a sick note, why you need one or where to get one from at the best of times; let alone when you&rsquo;re feeling unwell.  Here&rsquo;s a handy guide we&rsquo;ve put together for reference.								</p>
							</div>
						</article>
					</a>
										<a href="https://www.medicspot.co.uk/article/a-guide-to-the-nhs-for-students">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/International_Student.jpg);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>A Guide to the NHS for Students</h3>
								<h4><strong>Adam Thornhill</strong></h4>
								<h4 style="margin-top: 10px"><strong>
									09/12/2017									</strong></h4>
								<p>
									For the thousands of international students that will head to the United Kingdom to begin studies at university in the coming months, knowing how to register with an NHS GP will be really important.

There is so much to sort out when you decide to study abroad, from enrolling on your course and meeting new people, to finding student housing and possibly even a part-time job. It's little surprise that registering with the NHS is one of the last things on your mind so we've compiled a handy guide to get you started.								</p>
							</div>
						</article>
					</a>
										<a href="https://www.medicspot.co.uk/article/whats-a-uti">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/UTI-e1500883620253.jpg);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>What's a UTI?</h3>
								<h4><strong></strong></h4>
								<h4 style="margin-top: 10px"><strong>
									09/12/2017									</strong></h4>
								<p>
									It&rsquo;s estimated half of all women in the UK will have a UTI at least once in their life, and 1 in 2,000 healthy men will develop one each year.  Therefore we felt it was necessary to help you understand what are UTIs, how can you detect it and what can you do about it if you have been diagnosed.								</p>
							</div>
						</article>
					</a>
										<a href="https://www.medicspot.co.uk/article/what-you-need-to-know-about-hayfever">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/Hay_Fever.jpg);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>What You Need to Know About Hayfever</h3>
								<h4><strong>Dr Zubair Ahmed</strong></h4>
								<h4 style="margin-top: 10px"><strong>
									08/12/2017									</strong></h4>
								<p>
									It is estimated that hay fever affected approximately 13 million people in the UK last year. Hay fever is one of those illnesses that can cause sufferers no end of discomfort and inconvenience, especially during the summer months. The good news is that, working alongside a general practitioner, there are now numerous ways of treating this condition, and MedicSpot can help put you on the path to easing those symptoms.								</p>
							</div>
						</article>
					</a>
										<a href="https://www.medicspot.co.uk/article/everything-you-need-to-know-about-eczema-dermatitis">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/Eczema_Dermatitis.png);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>Everything you need to know about Eczema / Dermatitis</h3>
								<h4><strong>Dr Zubair Ahmed</strong></h4>
								<h4 style="margin-top: 10px"><strong>
									22/11/2017									</strong></h4>
								<p>
									Eczema, which may also be referred to as dermatitis, is a skin condition which affects many people all over the world.  Whether you have it temporarily or all of your life, it can be uncomfortable at best and painful and distressing at worst. For sufferers, there are a selection of treatment methods available to help relieve the symptoms.								</p>
							</div>
						</article>
					</a>
										<a href="https://www.medicspot.co.uk/article/is-your-daily-commute-harming-your-health">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(https://www.medicspot.co.uk/assets/images/blog-placeholder.jpg);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3>Is your Daily Commute Harming your Health?</h3>
								<h4><strong>Dr Zubair Ahmed</strong></h4>
								<h4 style="margin-top: 10px"><strong>
									14/11/2017									</strong></h4>
								<p>
									The daily commute to and from work can be incredibly tiring and frustrating, not to mention time-consuming. But could it also be harming your health?

Well, the research from numerous scientists and health experts from around the world certainly suggests so. From the hours of inactivity to the passive inhalation of vehicle exhaust fumes, your daily commute could be the most damaging aspect of your health.								</p>
							</div>
						</article>
					</a>
									</div>
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
				getAppointmentTimes(clinic_id, '22-04-2018');	
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