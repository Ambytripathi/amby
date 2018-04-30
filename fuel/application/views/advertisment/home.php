<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Medicspot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon/favicon.ico">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/favicon/apple-touch-icon.png">

    <link href="<?php echo base_url() ?>assets/ads/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>assets/ads/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>assets/ads/css/font-awesome.min.css" type="text/css" rel="stylesheet"
          media="all">
    
</head>
<body>
<nav class="navbar navigation text-center">
    <a href="<?php echo base_url(); ?>" target="_blank"><img src="<?php echo base_url() ?>assets/ads/images/medicspot_logo.png"></a>
</nav>
<?php
$replace_pairs = array(
    "%20" => ' ',
);
$town = strtr($town, $replace_pairs);
?>
<div class="col-xs-12 innercontent">
    <div class="container">
        <h1 class="header_subtitle" id="main_panel">See a Private GP Today</h1>
        <h2 class="header_description">Same Day Digital Doctor Service - Book an Appointment in <?php echo (!empty($town))?$town:'' ?></h2>        
        <div class="col-xs-12 search_result">            
            <h3 class="title black"><a href="javascript:void(0);"><?php echo (!empty($clinic_detail->cl_clinic_name))?$clinic_detail->cl_clinic_name:''; ?></a></h3>
            <h2 class="title black"><a href="javascript:void(0);"><?php echo (!empty($clinic_detail->cl_formatted_address))?$clinic_detail->cl_formatted_address:'' ?></a></h2>
            <h3 class="title"><a href="tel:<?php echo (!empty($clinic_detail->cl_phone_number))?$clinic_detail->cl_phone_number:'' ?>"><?php echo (!empty($clinic_detail->cl_phone_number))?$clinic_detail->cl_phone_number:'' ?></a></h3>
        </div>
        <div class="col-xs-12 main_panel">
            <div class="col-xs-12 col-sm-6 left panel">
                <div class="panel-header">
                    <h1 class="pickDate">Pick a date & time </h1>
                    <div class="col-xs-12 nopadding time_price">
                        <img style="display: none;height: 200px; position: absolute; left: 135px; margin-top: 89px;" id="booking-loader" src="<?php echo base_url() ?>assets/img/loading.gif" alt="Circular loading gif" >
                        <ul class="booking-panel-day-selector nav nav-tabs" role="tablist">
                            <li class="active today" data-date="<?php echo date('d-m-Y', strtotime('now')); ?>"
                                data-my-date="<?php echo date('Y-m-d', strtotime('now')); ?>">TODAY
                            </li>
                            <?php
                            $i = 1;
                            while ($i < 6) {
                                $date = date('d-m-Y', strtotime('now +' . $i . ' days'));
                                ?>
                                <li class="day-appointments" data-date="<?php echo $date; ?>"
                                    data-my-date=" <?php echo date('Y-m-d', strtotime($date)); ?>">
                                    <?php echo date('D', strtotime($date)); ?><br>
                                    <?php echo date('jS M', strtotime($date)); ?></li>
                                <?php
                                $i++;
                            }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="today">
                                <ul class="booking-panel-time-selector">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 right panel disabled">
                <div class="panel-header">
                    <div class="alert alert-danger" id="errorMsg" style="display:none;">
                    </div>
                    <div class="col-xs-12 nopadding payment_form">
                        <form action="javascript:;">
                            <div class="col-xs-6 halfpadding">
                                <label for="first-name" class="control-label">First Name *</label>
                                <input type="text" id="first-name" class="required form-control" maxlength="100" style="color:#111;" tabindex="1">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="Cardnumber">Card number *</label>
                                <input type="text" data-stripe="number" id="card_number" name="card_number" class="form-control" maxlength="16" style="color:#111;" tabindex="5">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="last-name" class="control-label">Last Name *</label>
                                <input type="text" id="last-name" class="required form-control" maxlength="250" style="color:#111;" tabindex="2">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="CVC">CVC *</label>
                                <input type="text" placeholder="CVC Number" data-stripe="cvc" id="cvc_number" name="cvc_number" class="form-control" maxlength="3" style="color:#111;" tabindex="6">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="email" class="control-label">Email *</label>
                                <input type="text" id="email" class="required form-control" maxlength="250" style="color:#111;" tabindex="3">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="zip-code" class="control-label">Expiry Month/Year *</label>
                                <input type="text" placeholder="MM" data-stripe="exp-month" id="exp_month" name="exp_month" class="month" maxlength="2" tabindex="7">
                                <input type="text" placeholder="YYYY" data-stripe="exp-year" id="exp_year" name="exp_year" class="year" maxlength="4" tabindex="8">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="phone-number" class="control-label">Phone Number *</label>
                                <input type="text" id="phone-number" class="required form-control" maxlength="60" style="color:#111;" tabindex="4">
                            </div>
                            <div class="col-xs-6 halfpadding">
                                <label for="promocode" class="control-label">Promocode</label>
                                <input type="text" id="promocode" class="form-control" maxlength="250" style="color:#111;" tabindex="9">
                            </div>

                            <div class="form-group form-padding" style="display:none;">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" id="address" class="form-control" maxlength="250" style="color:#111;">
                    </div>
                    <div class="form-group form-padding" style="display:none;">
                        <label for="city" class="control-label">City</label>
                        <input type="text" id="city" class="form-control" maxlength="120" style="color:#111;">
                    </div>
                    <div class="form-group form-padding" style="display:none;">
                        <label for="zip-code" class="control-label">Post Code</label>
                        <input type="text" id="zip-code" class="form-control" maxlength="120" style="color:#111;">
                    </div> 
                            <div class="checkbox col-xs-12">
                               <input class="styled" type="checkbox" value="1" name="tandc" id="tandc">
                                <label for="checkbox1">
                                    I accept the <a href="<?php echo base_url('terms');?>">Terms and Conditions</a> (no under 5's)
                                </label>
                            </div>                          
                            <button class="btn btn-primary" id="confirm" style="" data-style="expand-right">
                                Book Now <i class="fa fa-long-arrow-right"></i>
                            </button>
                            <button class="btn btn-default btn-lg" id="loading_btn" style="display:none"><i class="fa fa-refresh fa-spin"></i> Loading</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <h1 class="convenientText">Convenient Doctor Consultation at Your Local Pharmacy</h1>
        </div>
        <div class="col-xs-12 search_map">
            <div id="map" class="iframe"></div>
        </div>
        <div class="col-xs-12 clinical-station-diagram">
            <div class="col-xs-12">
             <h1 class="topsubtitle">How We Help You</h1>
            </div>
            <div class="col-xs-12 nopadding hidden-xs">
                    <div class="col-xs-12 col-sm-4 col-md-3 nopadding">
                        <div class="col-xs-12 diagram-list left">
                            <div class="content col-xs-8">
                                <h3 class="subtitle">No More Waiting</h3>
                                <p class="description">See a doctor whenever you want</p>
                            </div>
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/1.png)"></div>
                            <div class="content col-xs-8">
                                <h3 class="subtitle">Instant Medication</h3>
                                <p class="description">Collect your prescription immediately from the pharmacy</p>
                            </div>
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/2.png)"></div>
                            <div class="content col-xs-8">
                                <h3 class="subtitle">No Registration Needed</h3>
                                <p class="description">Just book and go with no pre-registration needed</p>
                            </div>
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/3.png)"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-4">
                        <img src="<?php echo base_url() ?>assets/ads/images/medical-station.jpg" class="img-responsive center-block mobileClinicImgSM" alt="Patient using stethoscope while talking to a private doctor online" >
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 nopadding">
                        <div class="col-xs-12 diagram-list right">
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/4.png)"></div>
                            <div class="content col-xs-8">
                                <h3 class="subtitle">Sick Notes & Referral Letters</h3>
                                <p class="description">No hidden charges for anything else that is required</p>
                            </div>
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/5.png)"></div>
                            <div class="content col-xs-8">
                                <h3 class="subtitle">The Best UK Doctors</h3>
                                <p class="description">Hand-picked expert online GPs to help you feel better</p>
                            </div>
                            <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/6.png)"></div>
                            <div class="content col-xs-8">
                                <h3 class="subtitle">Nationwide Coverage</h3>
                                <p class="description">Available from 50 convenient locations</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 nopadding visible-xs">
                    <div class="col-xs-12">
                        <img src="<?php echo base_url() ?>assets/ads/images/medical-station.jpg" class="img-responsive center-block mobileClinicImgSM" alt="Patient using stethoscope while talking to a private doctor online" >
                    </div>
                    <div class="col-xs-12 nopadding">
                        <div class="col-xs-12 diagram-list left">
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/1.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">No More Waiting</h3>
                                    <p class="description">See a doctor whenever you want</p>
                                </div>
                            </div>
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/2.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">Instant Medication</h3>
                                    <p class="description">Collect your prescription immediately from the pharmacy</p>
                                </div>
                            </div>
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/3.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">No Registration Needed</h3>
                                    <p class="description">Just book and go with no pre-registration needed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 nopadding">
                        <div class="col-xs-12 diagram-list right">
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/4.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">Sick Notes & Referral Letters</h3>
                                    <p class="description">No hidden charges for anything else that is required</p>
                                </div>
                            </div>
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/5.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">The Best UK Doctors</h3>
                                    <p class="description">Hand-picked expert online GPs to help you feel better</p>
                                </div>
                            </div>
                            <div class="col-xs-12 nopadding">
                                <div class="icon col-xs-4" style="background-image: url(<?php echo base_url() ?>assets/ads/images/6.png)"></div>
                                <div class="content col-xs-8">
                                    <h3 class="subtitle">Nationwide Coverage</h3>
                                    <p class="description">Available from 50 convenient locations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="col-xs-12 vidz">
            <h1 class="subtitle">Watch Short Video on How it Works</h1>
            <div class="col-xs-12 text-center xs-nopadding">
                <iframe src="https://player.vimeo.com/video/207370031" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="0"></iframe>
            </div>
            <div class="col-xs-12 text-center">
             <a href="javascript:void(0);" class="btn bookAnAppointment">Book an Appointment<i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 reviews">
            <h1 class="topSubtitle">What Patients Say About Us</h1>
            <div class="col-xs-5">
                <hr>
            </div>
            <div class="col-xs-2 xs-nopadding text-center"><i class="fa fa-quote-left"></i></div>
            <div class="col-xs-5">
                <hr>
            </div>
            <div class="col-xs-12 carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#quote-carousel" data-slide-to="0"><img class="img-responsive"
                                                                             src="<?php echo base_url() ?>assets/ads/images/michael2.png" alt="Photo of Michael smiling with red bow tie">
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive"
                                                                             src="<?php echo base_url() ?>assets/ads/images/nolan2.png" alt="nolan2.png" >
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="2" class="active"><img class="img-responsive"
                                                                                            src="<?php echo base_url() ?>assets/ads/images/Jacqueline.png" alt="Photo of Jacqueline smiling outside the private GP practice" >
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="3"><img class="img-responsive"
                                                                             src="<?php echo base_url() ?>assets/ads/images/kelly2.png" alt="Photo of Kelly smiling after her private GP appointment" >
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="4"><img class="img-responsive "
                                                                             src="<?php echo base_url() ?>assets/ads/images/trevor2.png" alt="Photo of Trevor smiling inside private GP consultation room" >
                    </li>
                </ol>
                <div class="carousel-inner text-center">
                    <div class="item active">
                        <p>“The station was so easy to use and the doctor had great bedside manner.”</p>
                    </div>
                    <div class="item">
                        <p>“Very quick, very thorough consultation on my issue. Very happy with outcome.”</p>
                    </div>
                    <div class="item">
                        <p>“Excellent service - saved me hours waiting in the urgent care centre as my GP was
                            closed.”</p>
                    </div>
                    <div class="item">
                        <p>“Excellent service - saved me hours waiting in the urgent care centre as my GP was
                            closed.”</p>
                    </div>
                    <div class="item">
                        <p>“Very quick, very thorough consultation on my issue. Very happy with outcome.”</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 accerdations">
            <div class="col-xs-12 col-sm-3">
                <img src="<?php echo base_url() ?>assets/ads/images/logo-st.png" class="img-responsive center-block" alt="Secure and trusted logo">
            </div>
            <div class="col-xs-12 col-sm-3">
                <img src="<?php echo base_url() ?>assets/ads/images/logo-gmc.png" class="img-responsive center-block" alt="General Medical Council logo" >
            </div>
            <div class="col-xs-12 col-sm-3">
                <img src="<?php echo base_url() ?>assets/ads/images/logo-ico.png" class="img-responsive center-block" alt="ICO logo" >
            </div>
            <div class="col-xs-12 col-sm-3">
                <img src="<?php echo base_url() ?>assets/ads/images/logo-cqc.png" class="img-responsive center-block" alt="Care Quality Commission logo" >
            </div>
        </div>
        <div class="col-xs-12 text-center">
        <a href="javascript:void(0);" class="btn bookAnAppointment">Book Same Day Appointment<i class="fa fa-long-arrow-right"></i></a>
       </div>
    </div>
</div>
<div class="col-xs-12 footer">
    <div class="container">
        <a href="<?php echo base_url('terms');?>" target="_blank">Terms & Conditions</a>
        <a href="<?php echo base_url('privacy');?>" target="_blank">Privacy &amp; Cookies Policy</a>
        <p>Medicspot Limited is registered in England at 93 Elizabeth Court, London, NW1 6EJ Registered No. 10089666. ©
            2017</p>
        <a href="javascript:void(0);" class="pull-right"><img src="<?php echo base_url() ?>assets/ads/images/mhra.png"
                                                              class="img-responsive" alt="Verification icon" ></a>
    </div>
</div>
<script>;
    $(window).scroll(function () {
        if ($(document).scrollTop() > 150) {
            $('.navigation').css('box-shadow', '0 2px 8px rgba(0,0,0,.15)');
        }
        else {
            $('.navigation').css('box-shadow', 'none');
        }
    });
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
    $(function () {
        $('.booking-panel-time-selector .available-hour').on('click', function () {
            $(".right.panel").removeClass("disabled");
            $(this).parent().find('.available-hour.selected').removeClass('selected');
            $(this).addClass('selected');
        });
    });
</script>
<script src="<?php echo base_url() ?>assets/ads/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/ads/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url('assets/js/moment-with-locales.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/ladda.min.js'); ?>"></script> 
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4258414.js"></script>
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
<script type="text/javascript"> window._chatlio = window._chatlio||[]; !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3"); n.setAttribute('data-widget-id','e044c554-ad9f-4657-4428-8af0255b2b93'); c.parentNode.insertBefore(n,c); }(); </script>
<script>
    var date = '<?php echo date('d-m-Y', strtotime('now'));?>';
    var mdate = '<?php echo date('Y-m-d', strtotime('now'));?>';
    var time = '';
    var service_duration = 15;
    var start_date = '';
    var end_date = '';
    var appointment = {};
    function initMap() {
        var lat = '<?php echo $clinic_detail->cl_lat ?>';
        var lon = '<?php echo $clinic_detail->cl_lng ?>';
        var uluru = {lat: parseFloat(lat), lng: parseFloat(lon)};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });

        var contentString = '<?php echo $clinic_detail->cl_formatted_address ?>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var markerIcon = new google.maps.MarkerImage(
            '<?php echo base_url('assets/images/map-marker.png');?>',
            new google.maps.Size(71, 71),
            new google.maps.Point(0, 0),
            new google.maps.Point(16, 16),
            new google.maps.Size(32, 32)
        );
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: markerIcon
        });
        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
    }

    $(function () {
        clinic_id = '<?php echo $clinic_detail->id ?>';
        booking_SelectEstablishment();
        getAppointmentTimes(clinic_id, '<?php echo date('d-m-Y', strtotime('now'));?>');
    });

    function getAppointmentTimes(clinic_id, date) {
        $('#booking-loader').show();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>index.php/appointments/ajax_get_available_hours',
            data: {
                'service_id': 13,
                'provider_id': 'any-provider',
                'selected_date': date,
                'service_duration': service_duration,
                'manage_mode': false,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'clinic_id': clinic_id
            },
            dataType: 'json',
            success: function (data) {
                $('#booking-loader').hide();
                $('.booking-panel-time-selector').html('');
                if (data.length == 0) {
                    $('.booking-panel-time-selector').html('<div class="closedToday" style="text-align:center;"><br>Closed Today</div>');
                } else {
                    $.each(data, function (i, item) {
                        var classData = '';
                        var block = '<li class="available-hour ' + classData + '" data-time="' + data[i] + '"><div class="time">' + data[i] + '</div><div class="price"><strong>£39</strong></div><div class="checked"><i class="fa fa-check-circle"></i></div></li>';
                        $('.booking-panel-time-selector').append(block);
                    })
                }
            }
        });
    }
    function booking_SelectEstablishment() {
        $('.booking-content').addClass('show-panel');
        $('.booking-wrapper').addClass('w-show-panel');
    }
    $('body').on('click', '.day-appointments', function () {

        $('.booking-panel-day-selector>.active').addClass('day-appointments');
        $('.booking-panel-day-selector>.active').removeClass('active');

        $(this).addClass('active');
        $(this).removeClass('day-appointments');

        date = $(this).attr('data-date');
        mdate = $(this).attr('data-my-date');
        getAppointmentTimes(clinic_id, date);
    });

    $('body').on('click', '.available-hour', function () {

        jQuery('.available-hour').removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('.right').removeClass('disabled');
        moment.locale('en-AU');

        time = $(this).attr('data-time');
        var timestring1 = mdate + ' ' + time;
        start_date = moment(timestring1).format('YYYY-MM-DD HH:mm');
        appointment.start_date = start_date;
        var end_date = moment(start_date).add(service_duration, 'minutes');
        end_date = end_date.format('YYYY-MM-DD HH:mm');
        appointment.end_date = end_date;
        jQuery('#next').show();
    });

    $('#confirm').on('click', function(){
    	$('#loading_btn').show();
    	$('#confirm').hide();
		
        if(clinic_id < 1){
			alert("Please Select Clinic First!");
		}else{
			$('#confirm').attr('disabled', true);
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>index.php/appointments/ajax_register_appointment',
				data: {
					'post_data[customer][last_name]':jQuery('#last-name').val(),
					'post_data[customer][first_name]':jQuery('#first-name').val(),
					'post_data[customer][email]':jQuery('#email').val(),
					'post_data[customer][phone_number]':jQuery('#phone-number').val(),
					'post_data[customer][address]':jQuery('#address').val(),
					'post_data[customer][city]':jQuery('#city').val(),
					'post_data[customer][zip_code]':jQuery('#zip-code').val(),
					'post_data[appointment][start_datetime]': appointment.start_date+':00',
					'post_data[appointment][end_datetime]': appointment.end_date+':00',
					'post_data[appointment][is_unavailable]':false,
					'post_data[appointment][id_users_provider]':'any-provider',
					'post_data[appointment][id_services]':13,
					'post_data[appointment][clinic_id]':clinic_id,
					'post_data[manage_mode]':false,
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					'clinic_id':clinic_id,
					'card_number':jQuery('#card_number').val(),
					'cvc_number':jQuery('#cvc_number').val(),
					'exp_month':jQuery('#exp_month').val(),
					'exp_year':jQuery('#exp_year').val(),
					'promocode':jQuery('#promocode').val(),
					'tandc':jQuery('#tandc').is(':checked')? 1 : '',
				},
				dataType:'json',
				success: function(data)
				{	
					setTimeout(function(){
						
					},10000);

					if(data.status==0){
						
						jQuery('#confirm').show();
						jQuery('#loading_btn').hide();
						jQuery('#errorMsg').show();
						jQuery('#errorMsg').html(data.msg);
						setTimeout(function(){
							jQuery('#errorMsg').hide();
						},2000);
						$('#confirm').attr('disabled', false);
					}else{                  
						window.location.href="<?php echo base_url() ?>booking_confirm";                    
					}
				}
			});
		}
    });

    $(".bookAnAppointment").click(function() {
      $('html, body').animate({
          scrollTop: $("#main_panel").offset().top
      }, 2000);
  });
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&callback=initMap">
</script>
</body>
</html>