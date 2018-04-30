<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>
<page id="faq">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title ?></h1>
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

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<?php $this->load->view('general-logo');?>
			</div>
		</div>
	</section>
</page>

<?php $this->load->view('_blocks/footer')?>
