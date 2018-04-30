<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>


<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script> 
<script> 
	hbspt.forms.create({ 
		portalId: "4258414",
		formId: "f1c1297d-fab2-4021-93e3-3d67993b90ad", 
		target: "#contactForm"
	 }); 
</script>
<page id="how-it-works">
	<section id="contact-info" class="dots-background text-section">
		<div class="container">
			<div class="section-header NewPharHead">
				<h1><?php echo $page->h1_title; ?></h1>
				<p class="subtitle"><?php echo fuel_var('sub_title',''); ?></p>
			</div>
			<section id="clinical-station-diagram" style="padding: 0rem 0 0rem">
				<div class="container">
					<div class="clinical-station-diagram">
						<ul class="diagram-list pharmDiagrm">
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-blood.png)"></div>
								<div class="content">
									<h3>Blood Pressure Cuff</h3>
									<p>Take blood pressure</p>
								</div>
							</li>
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-stethoscope.png)"></div>
								<div class="content">
									<h3>Stethoscope</h3>
									<p >Listen to heart and lungs</p>
								</div>
							</li>
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-medicam.png)"></div>
								<div class="content">
									<h3>MedicCam</h3>
									<p>Look into throat and ears</p>
								</div>
							</li>
						</ul>

						<div class="diagram-image-wrapper">
							<img src="assets/images/how-it-works/Private-GP-Consultation.jpg">
						</div>

						<ul class="diagram-list pharmDiagrm">
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-pulse.png)"></div>
								<div class="content">
									<h3>Pulse Oximeter</h3>
									<p >Measure oxygen levels and pulse rate</p>
								</div>
							</li>
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-thermometer.png)"></div>
								<div class="content">
									<h3>Thermometer</h3>
									<p >Take temperature</p>
								</div>
							</li>
							<li>
								<div class="icon" style="background-image: url(assets/images/icons/ms-prescription.png)"></div>
								<div class="content">
									<h3>Prescription</h3>
									<p>Prescribe private scripts</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<div class="content">
				<p>
						
				</p>
			</div>
		</div>
	</section>
</page>
	
	<section id="steps" class="steps threeSteps WhyWorkWithUs">
        <div class="container">
            <h1>Why Work With Us</h1>
            <ul class="steps-list">
                <li>
                    <img class="step-icon" src="https://www.medicspot.co.uk/assets/images/icons/Online-Doctor.png" alt="Illustration of an online doctor with a stethoscope draped over the doctor's shoulders" >
                    <h3>Offer A Unique Service</h3>
                    <p class="margintopInner">Our state-of-the-art telemedicine technology allows patients to have a video consultation with a MedicSpot GP from your pharmacy consulting room.</p>
                </li>
                <li>
                    <img class="step-icon" src="https://www.medicspot.co.uk/assets/images/icons/Private-GP-Near-Me-Icon.png" alt="Map with a location marker and the MedicSpot logo to illustrate the short distance to your nearest private GP" >
                    <h3>Increase Footfall</h3>
                    <p class="margintop">Online doctors can carry out a full remote clinical examination that increases the convenience and accessibility of quality healthcare in your local community.</p>
                </li>
                <li>
                    <img class="step-icon" src="https://www.medicspot.co.uk/assets/images/icons/Prescription.png" alt=" Illustration of two antibiotics and your prescription" >
                    <h3>Generate Additional Revenue</h3>
                    <p class="margintop">Any prescribed medication will be sent to your pharmacy staff so patients can collect their private prescriptions instantly and purchase OTC products.</p>
                </li>
            </ul>
        </div>
    </section>

    <page id="pricing" style="display: block;" >
		<section id="intro" class="dots-background diamond-background text-section">
			<div class="container">
				<div class="section-header NewPharHead">
					<h1>Join Our Waiting List</h1>
					<p class="subtitle">MedicSpot’s technology allows it to safely treat more conditions than any other online doctor service. Launch your in-house GP surgery powered by MedicSpot and join our growing network of innovative partner pharmacies.</p>
				</div>

				<div class="content">
					<div class="pricing-list moreSpacePrice">
						<div class="pricing-package" style="background-color: #B1560F;">
							<h3>Bronze Partners</h3>
							<div class="package-price">
							
								<div class="price-sum">£15</div>
								<div class="price-per">per month</div>
								<div class="setup-fee">£50 setup fee</div>
							</div>
							<a href="#" id="scrolOne" class="btn">Sign Up</a>
							<ul class="package-features">
								<li>Custom Branded Tablet</li>
								<li>Technical Support</li>
							</ul>					
						</div>
						<div class="pricing-package" style="background-color: #ACAEA9;">
							<h3>Silver Partners</h3>
							<div class="package-price">
								<div class="price-sum">£25</div>
								<div class="price-per">per month</div>
								<div class="setup-fee">£150 setup fee</div>
							</div>
							<a href="#" id="scroltwo" class="btn">Sign Up</a>
							<ul class="package-features">
								<li>Branded MedicSpot Station</li>
								<li>Technical Support</li>
								<li>Takes Online Bookings</li>
								<li>Digital Marketing Of Service</li>
								
								
							</ul>					
						</div>

						<div class="pricing-package" style="background-color: #CA912A;">
							<h3>Gold Partners</h3>
							<div class="package-price">
								<div class="price-sum">£45</div>
								<div class="price-per">per month</div>
								<div class="setup-fee">£450 setup fee</div>
							</div>

							<a href="#" id="scrolthree" class="btn">Sign Up</a>

							<ul class="package-features">
								<li>Branded MedicSpot Station</li>
								<li>Technical Support</li>
								<li>Takes Online Bookings</li>
								<li>Digital Marketing Of Service</li>
								<li>Marketing Materials</li>
								<li>Consultation Revenue Share</li>
							</ul>
							<div id="scrolCntct"></div>				
						</div>
					</div>

					<div class="pricing-disclaimer btmDisclaim">
						All Silver & Gold partners need to be approved by MedicSpot
					</div>
					
				</div>
			</div>
		</section>
	</page>
<page id="contact" class="pharmacyContact">
	<section id="contact-form">
		<div class="container">
			<div class="" id="">
				<from id="contactForm" >
					
				</from>
			</div>
		</div>
	</section>
</page>

	<section id="logos-qa" class="AsFeaturedIn" style="padding-top: 0px;">
		<div class="container">	
			<div class="section-header">
				<h1>As Featured In</h1>
			</div>		
			<div class="logo-list">				
				<a href="http://www.pharmaceutical-journal.com/20203483.article" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/pharmaceutical.png" title="Pharmaceutical Journal"></a>
				<a href="http://www.pharmacymagazine.co.uk/a-virtual-gp-surgery-within-a-pharmacy" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/pharmacy_magzine.png" title="Pharmacy Magzine"></a>
				<a href="http://www.thepharmacist.co.uk/clinical-champions-pharmacy-runs-virtual-gp-clinic/" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/The_Pharmacist-logo-green.png" title="The Pharmacist"></a>
				<a href="https://www.chemistanddruggist.co.uk/feature/how-will-patient-centred-technology-affect-pharmacy" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/C+D.png" title="C + D"></a>
				<a href="https://www.pharmafield.co.uk/Pf-Fox-News/Talent/2018/01/Dr-Zubair-Ahmed-brings-GP-experience-into-local-pharmacies" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/Pharmafield-Logo.png" title="Pharma Field" alt="Pharmafield logo" ></a>
			</div>
		</div>
	</section>
	<section id="testimonials" class="testimonials GoldTestimonial">
		<div class="container">
			<div class="section-header">
				<h1>Gold Partner Testimonial</h1>
			</div>
			<div class="testimonials-header">
				<hr class="testimonails-header-line">
				<i class="fa fa-quote-left"></i>
				<hr class="testimonails-header-line">
			</div>
			<div class="testimonials-quotes">
				<blockquote>
					<p>
						<?php echo fuel_var('pharmacy_quote',''); ?>	
					</p>
					<footer>
						<img class="testimony-avatar" src="<?php echo base_url('assets/images/'.fuel_var('pharmacy_image','')); ?>" alt="Photo of Meir Kattan, owner and pharmacist of Kalmak Chemist in London">
						<div class="testimony-name"><?php echo fuel_var('pharmacy_name',''); ?></div>
						<div class="testimony-profession">
							<?php echo fuel_var('pharmacy_title',''); ?>
						</div>
					</footer>
				</blockquote>
			</div>
		</div>
	</section>
	<section id="call-to-action" class="call-to-action">
        <div class="container">
            <h1>Launch Your In-House GP Surgery</h1>
            <p>Offer online, on-demand doctor consultations powered by MedicSpot</p>
            <a href="#" id="AplyJoin" class="btn s-large s-rounded s-inverted">Apply to join</a>
            <div class="call-to-action-features">
                <span>Increase footfall</span>
                <hr class="dot">
                <span>Increase revenue</span>
            </div>
        </div>
    </section>
</page>

<?php $this->load->view('_blocks/footer')?>
<script type="text/javascript">
	$(document).ready(function(){ 
		$('#AplyJoin').click(function(){ 
	         $("html, body").animate({ scrollTop: $("#scrolCntct").offset().top }, 500);
	        return false; 
	    }); 
		$('#scrolOne').click(function(){ 
	         $("html, body").animate({ scrollTop: $("#scrolCntct").offset().top }, 500); 
	        return false; 
	    });
		$('#scroltwo').click(function(){ 
	         $("html, body").animate({ scrollTop: $("#scrolCntct").offset().top }, 500); 
	        return false; 
	    });
		$('#scrolthree').click(function(){ 
	         $("html, body").animate({ scrollTop: $("#scrolCntct").offset().top }, 500);  
	        return false; 
	    }); 

	    
	});
</script>
