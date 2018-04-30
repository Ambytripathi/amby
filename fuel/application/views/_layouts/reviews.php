<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>
<page id="reviews">
	<section id="intro" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title ?></h1>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('body'); ?>
				</p>
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
			<div class="testimonials-reviews">
				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('published','yes');
					$reviews = $CI->db->get('reviews')->result_array();
				
					foreach($reviews as $r){
				?>
				<div class="review">
					<div class="review-meta">
						<img src="<?php echo base_url('assets/images/'.$r['avatar_image']);?>">
					</div>
					<div class="review-content">
						<?php echo $r['desc'];?>
					</div>
				</div>
				<?php } ?>
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
