<?php 
$slug = uri_segment(2);

if ($slug) :

	$press = fuel_model('press', array('find' => 'one', 'where' => array('slug' => $slug)));

	if (empty($press)) :
		redirect_404();
	endif;

else:

	$tags = fuel_model('tags');

endif;

if (!empty($press)) : ?>
	<?php $this->load->view('_blocks/header')?>
	
	<div class="blog-background"></div>

	<page id="blog">
		<section id="blog-index-header" class="text-section">
			<div class="container">
				<div class="section-header">
					<h1><?=fuel_edit($press)?><?php echo (!empty($press->title))?$press->title:'';?></h1>
					<div class="author"><?php echo (!empty($press->author->name))?$press->author->name:''?></div>
				</div>
			</div>
		</section>

		<section id="blog-article">
			<div class="container">
				<div class="article">
					<p class="introduction">
						<?=$press->summary?>
						
						<?=$press->content_formatted?> <?php  ?>
					</p>
				</div>

			</div>
		</section>
	</page>
<?php $this->load->view('_blocks/footer')?>
<?php else: ?>

<?php endif; ?>

