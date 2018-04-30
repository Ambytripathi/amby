<?php $this->load->view('_blocks/header')?>

<script language="javascript">
    var clinic_id = '';
</script>
<page id="home">
    <section id="booking" class="text-section">
        <div class="container">
            <div class="section-header">
                <h1>Your New Neighbourhood GP</h1>
                <p class="subtitle">Revolutionary online doctor consultation from your local pharmacy.</p>
            </div>
            <div class="col-xs-12" style="text-align: right;">   
                <button name="routeBtn" data-toggle="modal" data-target="#myModal" style="margin-right: 16px; margin-bottom: 10px;display: none" class="btn btn-primary routeBtn">Show Route</button>
            </div>                   
            <form id="booking-form">
                <div class="booking-wrapper">                    
                    <div class="booking-content">
                        <?php $this->load->view('general/booking-wrapper')?>
                    </div>
                </div>
                <div style="display:none;">
                    <input type="text" name="lat" id="lat" value="">
                    <input type="text" name="lng" id="lng" value="">
                </div>
            </form>
        </div>
    </section>

    <section id="logos-qa">
        <div class="container">
            <div class="logos-list">
                <img src="<?php echo base_url('assets/images/logo/logo-st.png');?>" title="Secure &amp; trusted">
                <img src="<?php echo base_url('assets/images/logo/logo-gmc.png');?>" title="General Medical Council">
                <img src="<?php echo base_url('assets/images/logo/logo-ico.png');?>" title="Information Commissioner’s Office">
                <img src="<?php echo base_url('assets/images/logo/logo-cqc.png');?>" title="CareQuality Commission">
            </div>
        </div>
    </section>

    <section id="steps" class="steps">
        <div class="container">
            <h1>Our simple steps</h1>
            <ul class="steps-list">
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/i-book.png');?>">
                    <h3>Book online to visit a Medicspot Digital Clinic</h3>
                    <p>Book online to visit one of our Pharmacy Digital Medicspot Clinics</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/i-doctor.png');?>">
                    <h3>Consult With Our Qualified&nbsp;Doctors</h3>
                    <p>Video chat and state-of-the-art remote examination with our expert GP’s.</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/i-prescription.png');?>">
                    <h3>Pick Up Your Prescription Straightaway</h3>
                    <p>Get prescribe you medication which you can pick up on your way out.</p>
                </li>
            </ul>
        </div>
    </section>

    <section id="logos-media">
        <div class="container">
            <h1>You might have seen us in?</h1>
            <div class="logos-list">
                <img src="<?php echo base_url('assets/images/logo/logo-bbc.png');?>" title="BBC">
                <img src="<?php echo base_url('assets/images/logo/logo-metro.png')?>" title="Metro">
                <img src="<?php echo base_url('assets/images/logo/logo-pj.png');?>" title="The Pharmaceutical Journal">
                <img src="<?php echo base_url('assets/images/logo/logo-et.png');?>" title="Evening Times">
                <img src="<?php echo base_url('assets/images/logo/logo-pulse.png');?>" title="Pulse">
            </div>
        </div>
    </section>

    <section id="video" class="dots-background with-media">
        <div class="container">
            <div class="content">
                <p>
                    Visit your nearest MedicSpot pharmacy and have a walk in consultation with one of MedicSpot’s UK registered General Practitioners<span class="hide-mobile"> within a matter of minutes</span>.
                </p>
                <a href="<?php echo base_url('what-we-treat');?>" class="btn s-large">What we treat</a>
            </div>
            <div class="media-wrapper">
                <div class="media-content">
                    <iframe id="main-homepage-video" src="https://player.vimeo.com/video/207370031" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="testimonials-header">
                <hr class="testimonails-header-line">
                <i class="fa fa-quote-left"></i>
                <hr class="testimonails-header-line">
            </div>
            <div class="testimonials-quotes testimonials-slicky">

                <?php                

                $CI =& get_instance();
                $CI->load->database();
                $CI->db->select('*');
                $CI->db->where('published','yes');
                $test = $CI->db->get('testimonials')->result_array();

                foreach($test as $t){
                    ?>
                    <div>
                        <blockquote>
                            <p>
                                “<?php echo $t['desc'];?>”
                            </p>
                            <footer>
                                <img class="testimony-avatar" src="<?php echo base_url('assets/images/').$t['avatar_image'];?>">
                                <div class="testimony-name"><?php echo $t['name'];?></div>
                            </footer>
                        </blockquote>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <section id="call-to-action" class="call-to-action">
        <div class="container">
            <h1>Ready to make an appointment?</h1>
            <p>Revolutionary online doctor consultation from your local pharmacy.</p>
            <a href="#booking" class="btn s-large s-rounded s-inverted">Book now</a>
            <div class="call-to-action-features">
                <span>No more waiting</span>
                <hr class="dot">
                <span>Only the best UK doctors</span>
            </div>
        </div>
    </section>
</page>

<script language="javascript">
    var place, marker;
    var markerArray = {};
    function booking_Map() { 
        var zoom = 6;
        if(typeof globals.lat!=="undefined"){
            place = {
                lat: parseFloat(globals.lat),
                lng: parseFloat(globals.lng)
            };
            zoom = 15;
        }else{
            place = {
				lat: parseFloat(53.787043),
				lng: parseFloat(-1.774170)
            };
        }
        map = new google.maps.Map(document.getElementById('booking-map'), {
            scrollwheel: false,
            zoom: zoom,
            center: place,
            draggable: true,
            gestureHandling: 'cooperative'
        });
        markerIcon = new google.maps.MarkerImage(
            '<?php echo base_url('assets/images/map-marker.png');?>',
            new google.maps.Size(32, 32),
            new google.maps.Point(0, 0),
            new google.maps.Point(16, 16),
            new google.maps.Size(32, 32)
        );

        // Add Markers.
        <?php
        $CI->db->select('*');
        $result = $CI->db->get('ea_clinics')->result_array();
        $i = 0;
        foreach($result as $r){
        ?>
        marker<?php $i;?> = new google.maps.Marker({
            position: {
                lat: parseFloat(<?php echo $r['cl_lat'];?>),
                lng: parseFloat(<?php echo $r['cl_lng'];?>)
            },
            map: map,
            icon: markerIcon            
        });
        marker<?php $i;?>.addListener('click', function() {
            map.setCenter(marker<?php $i;?>.getPosition());
            $('#booking_tab').trigger('click');            
            loadClinicData(<?php echo $r['id'];?>);
            booking_SelectEstablishment();                        
            getAppointmentTimes(<?php echo $r['id'];?>, '<?php echo date('d-m-Y', strtotime('now'));?>');            
        });
        markerArray[<?php echo $r['id'];?>] = marker<?php $i;?>;
        <?php
        $i++;
        } ?>
    }
</script>
<?php $this->load->view('_blocks/footer')?>
