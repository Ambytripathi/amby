<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>

<style type="text/css">
#how-it-works #clinical-station-diagram .clinical-station-diagram .diagram-list h2 {
    margin: 0 0 .8rem;
    color: inherit;
}</style>
<page id="how-it-works">
	<section id="video" class="dots-background with-media">
		<div class="container">
			<div class="content">
				<h1><?php echo $page->h1_title ?></h1>
				<p>
				<?php echo fuel_var('body',''); ?>
				</p>
			</div>
			<div class="media-wrapper">
				<div class="media-content">
					<iframe src="https://player.vimeo.com/video/207370031" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</section>

	<section id="steps" class="steps">
		<div class="container">
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="assets/images/icons/Private-GP-Near-Me-Icon.png" alt="Map with a location marker and the MedicSpot logo to illustrate the short distance to your nearest private GP">
					<h3>Find your nearest MedicSpot pharmacy and book online</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/i-pharmacy.png">
					<h3>Visit the pharmacy at your pre-booked timeslot</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/Online-Doctor.png" alt="Illustration of an online doctor with a stethoscope draped over the doctor's shoulders" >
					<h3>Have an online consultation with one of our expert GPs</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/Prescription.png" alt=" Illustration of two antibiotics and your prescription" >
					<h3>Collect your prescription on your way&nbsp;out</h3>
				</li>
			</ul>
		</div>
	</section>

	<section id="clinical-station-diagram">
		<div class="container">
			<h1>Safe &amp; Accurate Examination</h1>
			
			<section class="text-section">
				<div class="container">
					<div class="content">
						<p>
							<?php echo fuel_var('small_body',''); ?>
						</p>
					</div>
				</div>
			</section>
			<div class="clinical-station-diagram">
				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-blood.png)"></div>
						<div class="content">
							<h2>Blood Pressure Cuff</h2>
							<p>Allows your online GP to take<br> your blood pressure</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-stethoscope.png)"></div>
						<div class="content">
							<h2>Stethoscope</h2>
							<p>To listen to your<br> heart and lungs</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-medicam.png)"></div>
						<div class="content">
							<h2>MedicCam</h2>
							<p>Allows your online GP to look<br> into your throat or ears</p>
						</div>
					</li>
				</ul>

				<div class="diagram-image-wrapper">
					<img src="assets/images/how-it-works/Private-GP-Consultation.jpg">
				</div>

				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-pulse.png)"></div>
						<div class="content">
							<h2>Pulse Oximeter</h2>
							<p>To measure your oxygen<br> levels and pulse rate</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-thermometer.png)"></div>
						<div class="content">
							<h2>Thermometer</h2>
							<p>Allows your online <br>GP to take your<br> temperature</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-prescription.png)"></div>
						<div class="content">
							<h2>Prescription</h2>
							<p>Our doctors can prescribe<br> medication for you to<br> collect instantly</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<?php $this->load->view('general-logo');?>
			</div>
		</div>
	</section>

	<section id="call-to-action" class="call-to-action">
		<div class="container">
			<h1>See a GP Today</h1>
			<p>Revolutionary online GP service from your local pharmacy.</p>
			<a href="<?php echo base_url('our-clinics');?>" class="btn s-large s-rounded s-inverted">Book now</a>
			<div class="call-to-action-features">
				<span>No more waiting</span>
				<hr class="dot">
				<span>Only the best UK doctors</span>
			</div>
		</div>
	</section>

</page>
	
<?php $this->load->view('_blocks/footer')?>
