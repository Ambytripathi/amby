<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>


<page id="contact-business">
	<section id="contact-info" class="dots-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title ?></h1>
				<p class="subtitle"><?php echo fuel_var('sub_title',''); ?></p>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('body',''); ?>
				</p>
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

	<section id="talk-to-us" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1>Talk to us today to discuss how MedicSpot can help your staff to:</h1>
			</div>
			<div>
				<ul>
					<li>
						<i class="fa fa-check"></i>
						<p>Improve Health &amp; Wellbeing</p>
					</li>
					<li>
						<i class="fa fa-check"></i>
						<p>Reduce Absenteeism &amp; Improve Productivity</p>
					</li>
					<li>
						<i class="fa fa-check"></i>
						<p>Improve Happiness</p>
					</li>
				</ul>
				<a href="<?php echo base_url('/contact');?>" class="btn s-large">Contact Us</a>
			</div>
		</div>
	</section>
</page>
<?php $this->load->view('_blocks/footer')?>
