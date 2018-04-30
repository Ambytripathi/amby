<?php $this->load->view('_blocks/header')?>
<page id="home">

</page>

<page id="pricing">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading'); ?></h1>
				<p class="subtitle">
					<?php echo fuel_var('body'); ?>
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
	
<?php $this->load->view('_blocks/footer')?>
