		<footer id="page-footer">
			<div class="container">
				<nav id="page-quick-access">
					<section>
						<h3>How we help you</h3>
						<ul>
							<li><a href="<?php echo base_url('how-it-works');?>">How it works</a></li>
							<li><a href="<?php echo base_url('what-we-treat');?>">What we treat</a></li>
							<li><a href="<?php echo base_url('team');?>">About us</a></li>
							<li><a href="<?php echo base_url('faq');?>">FAQ</a></li>
							<li><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
						</ul>
					</section>
					<section>
						<h3>What we offer</h3>
						<ul>
							<li><a href="<?php echo base_url('our-clinics');?>">Our clinics</a></li>
							<li><a href="<?php echo base_url('pricing');?>">Pricing</a></li>
							<li><a href="<?php echo base_url('reviews');?>">Reviews</a></li>
							<li><a href="<?php echo base_url('blog');?>">Blog</a></li>
							<li><a href="<?php echo base_url('press');?>">Press</a></li>
						</ul>
					</section>
					<section>
						<h3>Partners</h3>
						<ul>
							<li><a href="<?php echo base_url('pharmacies');?>">For Pharmacy</a></li>
							<li><a href="<?php echo base_url('businesses');?>">For Business</a></li>
							<li><a href="<?php echo base_url('for-doctors');?>">For Doctors</a></li>
						</ul>
					</section>
				</nav>

				
			</div>
			
			<div id="page-legal" style="background-color: #F3F6F7;height: 170px;">
				<div class="container" style="background-color: #F3F6F7;">
					<div style="float: left;">
					<a href="<?php echo base_url('terms');?>" target="_blank">Terms & Conditions</a>
					<a href="<?php echo base_url('privacy');?>" target="_blank">Privacy &amp; Cookies Policy</a>
					<div>Medicspot Limited is registered in England at 93 Elizabeth Court, London, NW1 6EJ Registered No. 10089666. © 2017</div>
					</div>
					

					<div id="page-social" style="float: left;background-color: #F4F6F7;margin-left: 5%;">
					<nav class="nav-social">
						<a href="https://twitter.com/medicspot_uk" target="_blank" title="Twitter"><i class="zmdi fa fa-twitter"></i></a>
						<a href="https://www.facebook.com/medicspotuk/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
						<a href="https://www.linkedin.com/company/17946635/" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
						<a href="https://www.instagram.com/medicspot/" target="_blank" title="LinkedIn"><i class="fa fa-instagram"></i></a>
					</nav>
				</div>
				<div id="mhra-fmd-placeholder" style="text-align: left;float: left;background-color: #F4F6F7;margin-left: 8%;">
						<a href="https://medicine-seller-register.mhra.gov.uk/search-registry/649" target="_blank">
							<img src="<?php echo base_url('assets/images/mhra.png');?>" style="width:90px;" alt="Verification icon" >
						</a>
					</div>
					
				</div>
			</div>
		</footer>
		<?php if (!isset($_COOKIE["disclaimer"])) { ?>
    <div id="cookie-bar" class="fixed">
        <p>This website uses cookies to ensure you get the best experience on our website
            <a href="privacy" class="cb-policy">Find out more</a>
            <a href="javascript:;" id="cookie_stop" class="cb-ok">OK</a>
        </p>
    </div>
<?php } ?>
	</body>
<script>
    $(function () {
        $('#cookie_stop').click(function () {
            $('#cookie-bar').slideUp();

            var nDays = 999;
            var cookieName = "disclaimer";
            var cookieValue = "true";

            var today = new Date();
            var expire = new Date();
            expire.setTime(today.getTime() + 3600000 * 24 * nDays);
            document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + ";path=/";
        });

    });
</script>
<style>
    #cookie-bar {
        position: fixed;
        bottom: 0px;
        background-color: #000;
        padding: 10px;
        color: #fff;
        width: 100%;
        display: block;
        left: 0px;
        right: 0px;
        text-align: center;
    }

    .cb-ok {
        margin-left: 10px;
        border: 1px solid #fff;
        border-radius: 10%;
        padding: 2px 20px;
    }

    .cb-policy {
        text-decoration: underline;
    }
</style>
	<script language="javascript">
	$( document ).ready(function() {
		if (typeof clinic_id !== "undefined") {
			if(clinic_id!=''){
				booking_Map();
				loadClinicData(clinic_id, '');

				booking_SelectEstablishment();
				getAppointmentTimes(clinic_id, '<?php echo date('d-m-Y', strtotime('now'));?>');	
			}else{
				if ($('.booking-map').length) {
					booking_Map();
				}
			}
		}
	});
		var modal = document.getElementById('NEEDHELP_MODEL');

		var btn = document.getElementById("NEEDHELP");

		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
		    modal.style.display = "block";
		}

		span.onclick = function() {
		    modal.style.display = "none";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>
	<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#NEEDHELP').click(function(e) {
		        e.preventDefault();
		        $('body').removeClass('menu-shown');
		    });
		});
	</script>	
</html>
