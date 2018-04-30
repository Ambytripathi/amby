<?php 
$this->load->library('session');
$this->load->view('_blocks/header');
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
			<div class="section-header" style="padding: 4rem 0 0rem;">
				<h1><?php echo $page->h1_title ?></h1>
				<p class="subtitle"><?php echo fuel_var('sub_title',''); ?></p>
			</div>
			<div class="content">
				<p style="">
					<?php 	
					if(isset($_SESSION['confirm_message']) && !empty($_SESSION['confirm_message'])){
						echo $_SESSION['confirm_message'];	
					}else{
						redirect(base_url());
					}				
					 ?>	
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
</page>

<?php $this->load->view('_blocks/footer')?>
