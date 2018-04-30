
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> 
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	
	<?php
header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate"); 
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT"); 
?>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php
        $CI->load->database();
		if(isset($cl_clinic_name)){
            echo fuel_var('page_title');
            
        } else {
            $CI->db->where('location',uri_segment(1));
            $page = $CI->db->get('fuel_pages')->row();
            $meta_title = $page->meta_title;
        }  
        if(isset($cl_clinic_name)){

        }else{
            if (!empty($is_blog)) :

                echo $CI->fuel->blog->page_title($page_title, ' : ', 'right');
            else:

                $slug = uri_segment(1);

                if($slug=='article'){

                    $slug = uri_segment(2);
                    if ($slug){

                        $slug = uri_segment(2); 
						$CI->load->database();
                        $CI->db->where('slug', $slug);
                        $data = $CI->db->get('articles')->row_array();
						//print_r($data);
                        
						echo $data['title'];
						$meta_title = $data['meta_title'];
                        $meta_keywords = $data['meta_keywords'];
                        $meta_description = $data['meta_description'];

                        if (empty($data['title'])) :
                            redirect_404();
                        endif;

                    }

                }
			else if($slug == 'press' && !empty(uri_segment(2))){				
						$slug = uri_segment(2); 
						$CI->load->database();

                        $CI->db->where('slug', $slug);
                        $data = $CI->db->get('press')->row_array();
												
                        echo $data['title'];
						$meta_title = $data['meta_title'];
                        $meta_keywords = $data['meta_keywords'];
                        $meta_description = $data['meta_description'];
			}
			else{                					                        
                        echo fuel_var('page_title', '');
                }

            endif;
        }
              
        ?>
    </title>
    <?php 
    if(isset($cl_clinic_name)){
        $CI->db->where('cl_clinic_name',$cl_clinic_name);
        $row = $CI->db->get('ea_clinics')->row();        
        $meta_title = $row->meta_title;
        $meta_keywords = $row->meta_keywords;
        $meta_description = $row->meta_description;
    }
	$symbol = '£';
    ?>
	
	
	<meta name="title" content="<?php if(isset($meta_title)){ echo $meta_title;}else{ echo fuel_var('meta_title');}?>">
    <meta name="keywords" content="<?php if(isset($meta_keywords)){ echo $meta_keywords;}else{ echo fuel_var('meta_keywords');}?>">
    <meta name="description" content="<?php if(isset($meta_description)){ echo str_replace('&pound;',mb_convert_encoding($symbol, 'UTF-8', 'HTML-ENTITIES'), $meta_description); }else{ echo fuel_var('meta_description'); }?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">
    <link rel="icon" href="/assets/img/favicon/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/assets/img/favicon/apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/site.normalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/site.booking.css');?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/slick.css");?>"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4258414.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&libraries=places,geometry" type="text/javascript"></script>

    


    <script language="javascript">
        var globals = {};
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
    <script src="<?php echo base_url('assets/js/site.main.js');?>" defer></script>
    <script src="<?php echo base_url('assets/js/moment-with-locales.js');?>"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102975050-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-102975050-1');
    </script>
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:754624,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>


    <?php

    if (!empty($is_blog)):
        echo $CI->fuel->blog->header();
    endif;
    ?>
    <?=jquery()?>

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
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

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7XJWFH');</script>
	<script>
		window.intercomSettings = {
			app_id: "bj6zgv4a"
		};
	</script>
	
	<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/bj6zgv4a';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
	<?php
    if(isset($showIdOne) && $showIdOne == 2){
        ?>
        <script type="application/ld+json"> { "@context": "http://schema.org", "@type": "Organization", "url": "https://www.medicspot.co.uk/", "logo": "https://www.medicspot.co.uk/assets/images/logo-ms.png", "contactPoint": [{ "@type": "ContactPoint", "telephone": "+44 020 3637 8398", "contactType": "customer service" }] } </script>
        <?php
    }
    if(isset($showidClinic) && $showidClinic == 1){
        ?>
        <script type="application/ld+json"> { "@context": "http://schema.org", "@type": "Organization", "url": "https://www.medicspot.co.uk/our-clinics", "logo": "https://www.medicspot.co.uk/assets/images/logo-ms.png", "contactPoint": [{ "@type": "ContactPoint", "telephone": "+44 020 3637 8398", "contactType": "customer service" }] } </script>
        <?php
    }
    if (isset($showidContact) && $showidContact ==1) {
        ?>
        <script type="application/ld+json"> { "@context": "http://schema.org", "@type": "Organization", "url": "https://www.medicspot.co.uk/contact", "logo": "https://www.medicspot.co.uk/assets/images/logo-ms.png", "contactPoint": [{ "@type": "ContactPoint", "telephone": "+44 020 3637 8398", "contactType": "customer service" }] } </script>
        <?php
    }
	?>
</head>

<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7XJWFH"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<header id="page-header">
    <div class="container">
        <div class="page-header-wrapper">
            <a href="<?php echo base_url();?>" class="page-logo" title="Medicspot" style="background: url('<?php echo base_url('/assets/images/logo-ms.png');?>');    background-size: 15.2rem 4.8rem;">Medicspot</a>
            <nav class="nav-main">
                <div class="mobile-menu-header">
                    <a href="/" class="page-logo" title="Medicspot">Medicspot</a>
                    <button id="close-menu" title="Close Menu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <?php
                $CI->load->helper('url');
                $url = $CI->uri->segment_array();
                $record_num = end($url);?>
                <a href="javascript:void(0);" id="NEEDHELP">NEED HELP?</a>
                <a href="<?php echo base_url('pricing');?>" <?php if($record_num=='pricing'){?>class="active"<?php } ?>>Pricing</a>
                <a href="<?php echo base_url('how-it-works');?>" <?php if($record_num=='how-it-works'){?>class="active"<?php } ?>>How it works</a>
                <a href="<?php echo base_url('our-clinics');?>" <?php if($record_num=='our-clinics'){?>class="active btn bokNowbtn"<?php } ?> class="btn bokNowbtn">Book Now</a>

            </nav>
            <button id="show-menu" title="Show Menu">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
</header>
	<header id="page-header-two" style='display:<?php echo (isset($showDiv) && $showDiv == 1)? "block":"none";?>'>
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
        <img src="<?php echo base_url('assets/images/client_msg.png');?>" alt="Chat with MedicSpot icon" />
        <a href="javascript:void(0);" onclick="openChat();return false;" class="btn chatteam" id="chatteam">Chat With Our Team</a>
    </div>
    <div class="block two">
        <img src="<?php echo base_url('assets/images/client_email.png');?>" alt="Call MedicSpot icon" />
        <a href="mailto:info@medicspot.co.uk" class="btn">info@medicspot.co.uk</a>
    </div>
    <div class="block three">
        <img src="<?php echo base_url('assets/images/client_call.png');?>" alt="Call MedicSpot icon" />
        <a href="callto:020 3637 8398" class="btn">020 3637 8398</a>
    </div>
  </div>
</div>