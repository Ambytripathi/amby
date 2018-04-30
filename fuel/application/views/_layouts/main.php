<?php
error_reporting(0);
    $data['showId'] = 1;
    $data['showIdOne'] = 2;
?>

<?php $this->load->view('_blocks/header', $data); ?>
<script language="javascript">
    var clinic_id = '';
</script>

<page id="home">
    <section id="booking" class="text-section">
        <div class="container">
            <div class="section-header homeSec">
                <h1>Private GP Services At Your Local Pharmacy</h1>
                <p class="subtitle subtitlenew">“How can I find a GP near me?”</p>
                <p class="subtitle second">Search for your nearest MedicSpot private GP practice and book a same day appointment</p>
            </div>
            <div class="col-xs-12" style="text-align: right;">   
                <button name="routeBtn" data-toggle="modal" data-target="#myModal" style="margin-right: 16px; margin-bottom: 10px;display: none" class="btn btn-primary routeBtn">Show Route</button>
            </div>                   
            <form id="booking-form" action="javascript:;">
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
     <section id="logos-media" style="background-color:#F4F6F7">
        <div class="container">
            <h1 style="color:black;">“Revolutionary”</h1>
            <div class="logos-list">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/32/Evening_Standard_logo.png" title="BBC" alt="BBC logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-metro.png')?>" title="Metro" alt="Metro logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-pj.png');?>" title="The Pharmaceutical Journal" tag="The Pharmaceutical Journal logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-et.png');?>" title="Evening Times" alt="Evening Times logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-pulse.png');?>" title="Pulse" alt="Pulse logo" >
            </div>
        </div>
    </section>
    <section id="steps" class="steps howWeHelpYou">
        <div class="container">
            <h1 class="heading02">How We Help You</h1>
            <p class="help_description">MedicSpot makes it simple and easy to get the care you need – no matter where you are or when you need it. We answer your search for “private GP london” or “private GP near me” with 50+ pharmacy <a href="<?php echo base_url('our-clinics');?>">walk in centres.</a> Our nationwide coverage gives you convenient access to private GPs so you never have to wait for healthcare again.</p>
            <ul class="steps-list">
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/clock.png');?>" alt="White clock icon on MedicSpot purple background">
                    <h3 style="text-transform: capitalize;">Saving You Time</h3>
                    <p class="margintop">No more wait times. Instantly pick up prescriptions. MedicSpot offers same day private GP appointments at your local pharmacy walk in centre. </p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/stethoscope.png');?>" alt="White stethoscope icon on MedicSpot purple background" >
                    <h3 style="text-transform: capitalize;">Treating You Better</h3>
                    <p class="margintopInner">Expert UK based GPs. Remote diagnostic capabilities. MedicSpot Clinical Stations are fitted with state-of-the-art examination equipment to expertly manage your health issue.</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/documentapprove.png');?>" alt="White clipboard icon with check mark on MedicSpot purple background" >
                    <h3 style="text-transform: capitalize;">Supporting you always</h3>
                    <p class="margintop">Visiting a new city? Travelling the UK? MedicSpot can be used by anyone, anywhere, even if you’re not registered with an NHS GP.</p>
                </li>
            </ul>
            <a href="<?php echo base_url('what-we-treat');?>" class="btn s-large newsecbtn">What we treat</a>
        </div>
    </section>
    <section id="steps" class="steps threeSteps" style="background-color:#F4F6F7">
        <div class="container">
            <h1>See a Private GP Quickly</h1>
            <ul class="steps-list">
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/Private-GP-Near-Me-Icon.png');?>" alt="Map with a location marker and the MedicSpot logo to illustrate the short distance to your nearest private GP">
                    <h3>Book Online</h3>
                    <p class="margintop">Book a convenient same day private GP appointment.</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/Online-Doctor.png');?>" alt="Illustration of an online doctor with a stethoscope draped over the doctor's shoulders"  >
                    <h3>Visit Your Selected Pharmacy</h3>
                    <p class="margintopInner">Seeing a doctor has never been so
                            easy. Eliminate your second journey by
                            having a private GP appointment from
                            your local pharmacy consulting room.
                            Get seen and collect your medication in
                            three quick and easy steps.</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/Prescription.png');?>" alt=" Illustration of two antibiotics and your prescription" >
                    <h3>Collect Your Prescription Instantly</h3>
                    <p class="margintop">Your medicine will be available to collect immediately from the same pharmacy.</p>
                </li>
            </ul>
        </div>
    </section>
<section id="steps" class="steps howWeHelpYou">
        <div class="container">
            <h1 class="heading02" style="color:#f9418d">Expert UK Doctors</h1>
          
            <ul class="steps-list">
                <li style="box-shadow:none !important;">
                    <img class="step-icon" src="https://www.medicspot.co.uk/assets/images/team-people/d-fk.png" alt="White clock icon on MedicSpot purple background">
                    <h3 style="text-transform: capitalize;color:black;">Dr. Faiza Khalid</h3><span>12 years experience</span><br><br>
                    <p class="margintop">I joined MedicSpot to see patients when I would not have been able to otherwise. The flexibility to work as a private doctor online allows me to help people on weekends and out of hours, from all over the UK, with many different types of health conditions.</p>
                </li>
                <li style="box-shadow:none !important;">
                    <img class="step-icon" src="https://www.liverostrum.com/wp-content/uploads/2014/10/Dr.-Muhammad-Zubair-Ahmad.png" alt="White stethoscope icon on MedicSpot purple background" >
                    <h3 style="text-transform: capitalize;color:black;">Dr. Zubair Ahmed</h3><span>12 years experience</span><br><br>
                    <p class="margintopInner">I founded MedicSpot with a single mission - to increase patient experiences and outcomes, leading to a healthier nation. As an online private GP, I feel clinically supported by the ability to take vital signs and to examine patients safely and accurately.</p>
                </li>
                <li style="box-shadow:none !important;">
                    <img class="step-icon" src="https://www.medicspot.co.uk/assets/images/zubair2.png" alt="White clipboard icon with check mark on MedicSpot purple background" >
                    <h3 style="text-transform: capitalize;color:black;">Dr. Abby Hyams</h3>
                    <span>12 years experience</span><br><br>
                    <p class="margintop">I joined MedicSpot for the opportunity to spend more time with my young family since I was working long hours as an NHS GP partner. MedicSpot allows me to work from home in a clinically supported environment whilst still allowing me to do some NHS work. It’s the best of both worlds</p>
                </li>
            </ul>
            </div>
    </section>
    <section id="steps" class="steps gp_services gpServicZero" style="background-color:#F4F6F7">
        <div class="container">
            <h1>Our Private GP Services</h1>
            <p class="help_description">Patient care is at the
                            forefront of everything we
                            do; from expert NHS
                            registered doctors to
                            state-of-the-art diagnostic
                            devices. As we continue to
                            evolve our private GP
                            services, we will always put
                            your health first to remain
                            your trusted private
                            healthcare provider.</p>
            <ul class="steps-list">
                <li>
                    <h3>Clinical Examinations</h3>
                    <p>MedicSpot can treat 96% of conditions successfully - more than any other UK based online doctor service.</p>
                </li>
                <li>
                    <h3>Private Prescriptions</h3>
                    <p>MedicSpot does not charge for issuing prescriptions. Your online doctor will simply send the prescription to the same pharmacy for instant collection.</p>
                </li>
                <li>
                    <h3>Sick Notes & Specialist Referrals</h3>
                    <p>MedicSpot does not charge for issuing sick notes or referrals. If you are not fit for work or school, or need a specialist referral, your private GP will email this to you after the consultation.</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="logoHome" id="logos-qa" style="background-color:#F4F6F7">
        <div class="container">
            
            <div class="logos-list" style="border:2px solid #6D56EE;border-radius:10px;max-width: 64rem;">
                <img src="http://fixwebsupport.com/ambi/medicspot/assets/images/logo/logo-cqc.png" style=""><p style="color:#6D56EE;">MedicSpot is regulated by the Care Quality Commision<br>and is one of only afew digital healthcare providers to have<br>received top marks for clinical safety.</p>

            </div>
        </div>
    </section>
    <section id="logos-media">
        <div class="container">
            <h1>You might have seen us in?</h1>
            <div class="logos-list">
                <img src="<?php echo base_url('assets/images/logo/logo-bbc.png');?>" title="BBC" alt="BBC logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-metro.png')?>" title="Metro" alt="Metro logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-pj.png');?>" title="The Pharmaceutical Journal" tag="The Pharmaceutical Journal logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-et.png');?>" title="Evening Times" alt="Evening Times logo" >
                <img src="<?php echo base_url('assets/images/logo/logo-pulse.png');?>" title="Pulse" alt="Pulse logo" >
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials WhatPatientsSayAboutUs">
    	<h2 class="title">What Patients Say <span>About Us</span></h2>
        <div class="container">
			
            <div class="testimonials-header">
                <hr class="testimonails-header-line">
                <i class="fa fa-quote-left"></i>
                <hr class="testimonails-header-line">
            </div>
            <div class="testimonials-quotes testimonials-slicky" id="slickySlidertext">
				
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
    <page id="faq">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1>Frequently Asked Questions</h1>
			</div>
			<div class="content">
				<dl class="faq-list">
					<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('published','yes');
					$faqs = $CI->db->get('faqs')->result_array();
				
					foreach($faqs as $f){
					?>
					<dt><?php echo $f['question'];?></dt>
					<dd>
						<?php echo $f['answer'];?>
					</dd>
					<?php } ?>
				</dl>
			</div>
		</div>
	</section>
    <section id="call-to-action" class="call-to-action">
        <div class="container">
            <h1>See An Online Doctor Today</h1>
            <p>Book a private GP consultation at your local pharmacy walk in centre.</p>
            <a href="<?php echo base_url('our-clinics');?>" class="btn s-large s-rounded s-inverted">Book now</a>
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
        <?php
        $CI->db->select('*');
        $result = $CI->db->get('ea_clinics')->result_array();
        $i = 0;
        foreach($result as $r){
        	if($r['id'] == 27){
				
			}else{
				?>
				marker<?php $i;?> = new google.maps.Marker({
					position: {
						lat: parseFloat(<?php echo $r['cl_lat'];?>),
						lng: parseFloat(<?php echo $r['cl_lng'];?>)
					},
					icon: markerIcon,
					map: map
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
			}
        $i++;
        } ?>
    }
</script>
<?php $this->load->view('_blocks/footer')?>
