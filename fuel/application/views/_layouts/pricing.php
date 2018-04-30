<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>
	
<page id="pricing">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title ?></h1>
				<p class="subtitle">
				<?php echo fuel_var('body',''); ?>
				</p>
			</div>
			<div class="content">
				<div class="pricing-list">
					<div class="pricing-package">
						<h3>Pay Monthly</h3>
						<div class="package-price">
						
							<div class="price-sum">£<?php echo fuel_var('pay_month',''); ?></div>
							<div class="price-per">per month</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<?php echo fuel_var('pay_month_benefits',''); ?>
					</div>
					<div class="pricing-package">
						<h3>Single Consultation</h3>
						<div class="package-price">
							<div class="price-sum">£<?php echo fuel_var('pay_oneoff',''); ?></div>
							<div class="price-per">One off</div>
						</div>
						<a href="/" class="btn">Book Now</a>
						<?php echo fuel_var('pay_oneoff_benefits',''); ?>
					</div>
					<div class="pricing-package">
						<h3>Pay Annually</h3>
						<div class="package-price">
							<div class="price-sum">£<?php echo fuel_var('pay_annually',''); ?></div>
							<div class="price-per">per year</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<?php echo fuel_var('pay_annually_benefits',''); ?>
					</div>
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
				<?php $this->load->view('general-logo');?>
			</div>
		</div>
	</section>
</page>

	
<?php $this->load->view('_blocks/footer')?>
