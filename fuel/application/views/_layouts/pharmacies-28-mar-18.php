<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>


<page id="how-it-works">
	<section id="contact-info" class="dots-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title ?></h1>
				<p class="subtitle"><?php echo fuel_var('sub_title',''); ?></p>
			</div>
			<section id="clinical-station-diagram" style="padding: 0rem 0 0rem">
		<div class="container">
			<h1>Medicspot Clinical Station</h1>
			<div class="clinical-station-diagram">
				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-blood.png)"></div>
						<div class="content">
							<h3>Blood Pressure Cuff</h3>
							<p class="textRight">Allows your doctor to take<br> your blood pressure</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-stethoscope.png)"></div>
						<div class="content">
							<h3>Stethoscope</h3>
							<p class="textRight">To listen to your<br> heart and lungs</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-medicam.png)"></div>
						<div class="content">
							<h3>MedicCam</h3>
							<p class="textRight">To look into your<br> throat or ears</p>
						</div>
					</li>
				</ul>

				<div class="diagram-image-wrapper">
					<img src="assets/images/how-it-works/medical-station.jpg">
				</div>

				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-pulse.png)"></div>
						<div class="content">
							<h3>Pulse Oximeter</h3>
							<p class="textLeft">Measures your oxygen<br> levels and pulse rate</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-thermometer.png)"></div>
						<div class="content">
							<h3>Thermometer</h3>
							<p class="textLeft">To take your<br> temperature</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-prescription.png)"></div>
						<div class="content">
							<h3>Prescription</h3>
							<p class="textLeft">Our doctors can prescribe<br> medication for you to<br> collect instantly</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
			<div class="content">
				<p>
					<?php echo fuel_var('body',''); ?>	
				</p>
			</div>
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">			
			<div class="logo-list">				
				<a href="http://www.pharmaceutical-journal.com/20203483.article" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/pharmaceutical.svg" title="Pharmaceutical Journal"></a>
				<a href="http://www.pharmacymagazine.co.uk/a-virtual-gp-surgery-within-a-pharmacy" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/pharmacy_magzine.png" title="Pharmacy Magzine"></a>
				<a href="http://www.thepharmacist.co.uk/clinical-champions-pharmacy-runs-virtual-gp-clinic/" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/The_Pharmacist-logo-green.png" title="The Pharmacist"></a>
				<a href="https://www.chemistanddruggist.co.uk/feature/how-will-patient-centred-technology-affect-pharmacy" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/C+D.png" title="C + D"></a>
				<a href="https://www.pharmafield.co.uk/Pf-Fox-News/Talent/2018/01/Dr-Zubair-Ahmed-brings-GP-experience-into-local-pharmacies" target="_blank"><img style="max-width:23%; padding: 25px" src="assets/images/logo/Pharmafield-Logo.png" title="Pharma Field"></a>
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
			<div class="testimonials-quotes">
				<blockquote>
					<p>
						<?php echo fuel_var('pharmacy_quote',''); ?>	
					</p>
					<footer>
						<img class="testimony-avatar" src="<?php echo base_url('assets/images/'.fuel_var('pharmacy_image','')); ?>">
						<div class="testimony-name"><?php echo fuel_var('pharmacy_name',''); ?></div>
						<div class="testimony-profession">
							<?php echo fuel_var('pharmacy_title',''); ?>
						</div>
					</footer>
				</blockquote>
			</div>
		</div>
	</section>
	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<img src="assets/images/logo/logo-st.png" title="Secure &amp; trusted">
				<img src="assets/images/logo/logo-gmc.png" title="General Medical Council">
				<img src="assets/images/logo/logo-ico.png" title="Information Commissioner’s Office">
				<img src="assets/images/logo/logo-cqc.png" title="CareQuality Commission">
			</div>				
		</div>
	</section>
</page>

<?php $this->load->view('_blocks/footer')?>
