<?php $this->load->view('_blocks/header')?>

<page id="contact-doctors">
	<section id="contact-info" class="dots-background text-section">
		<div class="container">
			<div class="section-header" style="padding-bottom: 0px;">
				<h1><?php echo fuel_var('heading',''); ?></h1>
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

	<section id="call-to-action" class="call-to-action">
		<div class="container">
			<h1>
				<?php echo fuel_var('footer_cta',''); ?>
			</h1>
		</div>
	</section>
</page>

<?php $this->load->view('_blocks/footer')?>
