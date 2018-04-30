<?php $this->load->view('_blocks/header');
$slug = uri_segment(1);
$CI =& get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->where('location',$slug);
$page = $CI->db->get('fuel_pages')->row();
?>

<div class="blog-background"></div>

<page id="blog-index">
	<section id="blog-index-header" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo $page->h1_title; ?></h1>
			</div>
		</div>
	</section>

	<section id="blog-article-list">
		<div class="container">
				<div class="article-list">
					<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*, press.title as article_title');
					$CI->db->where('press.published','yes');
					$CI->db->join('teams', 'teams.id = press.author_id', 'left');
					$articles = $CI->db->get('press')->result_array();
				
					foreach($articles as $a){
					?>
					<a href="<?php echo base_url('press/'.$a['slug']);?>">
						<article class="blog-item">
							<div class="blog-item-thumbnail" style="background-image: url(<?php echo base_url('assets/images/'.$a['main_image']);?>);background-size:cover;"></div>
							<div class="blog-item-content">
								<h3><?php echo $a['article_title'];?></h3>
								<h4><strong><?php echo $a['name']; ?></strong></h4>
								<h4 style="margin-top: 10px"><strong>
									<?php 
										if($a['created_at'] != '0000-00-00 00:00:00'){
								echo date('d/m/Y', strtotime($a['created_at']));
								} else {
						echo date('d/m/Y', strtotime($a['date_added']));
								} 
								?>
									</strong></h4>
								
								<p>
									<?php echo $a['summary'];?>
								</p>
							</div>
						</article>
					</a>
					<?php } ?>
				</div>
		</div>
	</section>
</page>
<?php $this->load->view('_blocks/footer')?>
