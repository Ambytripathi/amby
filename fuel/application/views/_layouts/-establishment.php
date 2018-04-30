<?php
$CI =& get_instance();
$CI->load->helper('url');
$CI->load->database();
$url = $CI->uri->segment_array();

$url2 = array_splice($url, 1, 5);
$built_url = '';
foreach($url2 as $b){
	$built_url.=$b.'/';
}
$built_url = substr($built_url, 0, -1);
$built_url = rtrim($built_url,"/");
$CI->db->select('*');
$CI->db->where('ea_clinics.url', $built_url);
$CI->db->or_where('ea_clinics.alias_url', $built_url);
$CI->db->or_where('ea_clinics.alias_url2', $built_url);
$CI->db->or_where('ea_clinics.alias_url3', $built_url);
$CI->db->or_where('ea_clinics.alias_url4', $built_url);

$CI->db->join('ea_settings', 'clinic_id=ea_clinics.id');
$data = $this->db->get('ea_clinics')->row_array();
if(sizeof($data)==0){
	show_404();
}

$clinic_id = $data['clinic_id'];
$data['showDiv'] = 1;


$this->load->view('_blocks/header', $data);

?>
<script language="javascript">
globals = {};
globals.lat = '<?php echo $data['cl_lat'];?>';
globals.lng = '<?php echo $data['cl_lng'];?>';

var clinic_id = '<?php echo $clinic_id;?>';

</script>
<?php
			
$opening_hours = '';
$opening_hours_array = json_decode(str_replace('\"','',$data['value']), JSON_UNESCAPED_SLASHES);
$opening_hours.='<table cellpadding="10" cellspacing="10">';
foreach($opening_hours_array as $key=>$value){
	if(empty($value['start'])){
		$opening_hours.='<tr><td>'.ucfirst($key).':</td><td> Closed</td></tr>';
	}else{
		$opening_hours.='<tr><td>'.ucfirst($key).':</td><td> '.$value['start'].' to '.$value['end']. ' </td></tr>';
	}
}
$opening_hours.='</table>';
$data['opening_hours'] = $opening_hours;



?>


<page id="establishment" class="estab">
	<section id="testimonials" class="testimonials m_top_30">
		<div class="container">
			<div class="section-header NewSecHeader" id="Reviews">
				<h1>
					<?php 
					if(!empty($data['h1_title'])){
						echo "Private GP Services At<span>".$string1 = str_replace('Private GP Services At', ' ', $data['h1_title'])."</span>";
					} else {
						echo "MedicSpot Clinic <span>".$string1 = str_replace('MedicSpot Clinic', ' ', $data['cl_clinic_name'])."</span>";
					}
					?>
				</h1>
				<p class="subtitle">Same Day Online Doctor Service</p>
				<p class="subtitle heading02" >
					<?php
						if($clinic_id == 16){
							echo "Book To See A Cricklewood GP";
							$visit_our = "Cricklewood";
							$see_X = "A Cricklewood";
							$visit_our_walk = "Cricklewood";

						}else if($clinic_id == 17){
							echo "Book To Visit Our Walk In Centre Euston";
							$visit_our = "Euston";
							$see_X = "A Euston";
							$visit_our_walk = "Euston";

						}else if($clinic_id == 18){
							echo "Book To See A GP In Shepherds Bush";
							$visit_our = "Shepherds Bush";
							$see_X = "A Shepherds Bush";
							$visit_our_walk = "Shepherds Bush";

						}else if($clinic_id == 21){
							echo "Book To See A GP In Harrow on the Hill";
							$visit_our = "Harrow";
							$see_X = "A Harrow";
							$visit_our_walk = "Harrow";

						}else if($clinic_id == 22){
							echo "Book To See A Southwark GP";
							$visit_our = "Southwark";
							$see_X = "A Southwark";
							$visit_our_walk = "Southwark";

						}else if($clinic_id == 23){
							echo "Book To See A GP In Islington";
							$visit_our = "Islington";
							$see_X = "An Islington";
							$visit_our_walk = "Islington";

						}else if($clinic_id == 24){
							echo "Book To See A GP In Barbican";
							$visit_our = "Barbican";
							$see_X = "A Barbican";
							$visit_our_walk = "Barbican";

						}else if($clinic_id == 25){
							echo "Book To Visit Our Walk In Clinic Paddington";
							$visit_our = "Paddington";
							$see_X = "A Paddington";
							$visit_our_walk = "Paddington";

						}else if($clinic_id == 26){
							echo "Book To See An Earls Court GP";
							$visit_our = "Earls Court";
							$see_X = "An Earls Court";
							$visit_our_walk = "Earls Court";

						}else if($clinic_id == 27){
							echo "Book To Visit Our Walk In Clinic Holborn";
							$visit_our = "Holborn";
							$see_X = "A Holborn";
							$visit_our_walk = "Holborn";

						}else if($clinic_id == 28){
							echo "Book To See A GP In Glasgow";
							$visit_our = "Glasgow";
							$see_X = "A Glasgow";
							$visit_our_walk = "Glasgow";

						}else if($clinic_id == 29){
							echo "Book To See A Willesden GP";
							$visit_our = "Willesden";
							$see_X = "A Willesden";
							$visit_our_walk = "Willesden";

						}else if($clinic_id == 30){
							echo "Book To See Our Notting Hill Doctors";
							$visit_our = "Notting Hill";
							$see_X = "A Notting Hill";
							$visit_our_walk = "Notting Hill";

						}else if($clinic_id == 31){
							echo "Book To Visit Our Walk In Centre South Kensington";
							$visit_our = "South Kensington";
							$see_X = "A South Kensington";
							$visit_our_walk = "South Kensington";

						}else if($clinic_id == 32){
							echo "Book To See An Isleworth GP";
							$visit_our = "Isleworth";
							$see_X = "An Isleworth";
							$visit_our_walk = "Isleworth";

						}else if($clinic_id == 33){
							echo "Book To See Our Mayfair Doctors";
							$visit_our = "Mayfair";
							$see_X = "A Mayfair";
							$visit_our_walk = "Mayfair";

						}else if($clinic_id == 34){
							echo "Book To See A Clapham GP";
							$visit_our = "Clapham";
							$see_X = "A Clapham";
							$visit_our_walk = "Clapham";

						}else if($clinic_id == 35){
							echo "Book To See A South Kensington GP";
							$visit_our = "South Kensington";
							$see_X = "A South Kensington";
							$visit_our_walk = "South Kensington";

						}else if($clinic_id == 36){
							echo "Book To See A Tower Bridge GP";
							$visit_our = "Tower Bridge";
							$see_X = "A Tower Bridge";
							$visit_our_walk = "Tower Bridge";

						}else if($clinic_id == 37){
							echo "Book To See A Stockwell GP";
							$visit_our = "Stockwell";
							$see_X = "A Stockwell";
							$visit_our_walk = "Stockwell";

						}else if($clinic_id == 38){
							echo "Book To See A GP In Elephant and Castle ";
							$visit_our = "Elephant and Castle";
							$see_X = "An Elephant and Castle";
							$visit_our_walk = "Elephant and Castle";

						}else if($clinic_id == 39){
							echo "Book To See A GP In Chelsea";
							$visit_our = "Chelsea";
							$see_X = "A Chelsea";
							$visit_our_walk = "Chelsea";

						}else if($clinic_id == 40){
							echo "Book To See Our Primrose Hill Doctors";
							$visit_our = "Primrose Hill";
							$see_X = "A Primrose Hill";
							$visit_our_walk = "Primrose Hill";

						}else if($clinic_id == 41){
							echo "Book To See A Pimlico GP";
							$visit_our = "Pimlico";
							$see_X = "A Pimlico";
							$visit_our_walk = "Pimlico";

						}else if($clinic_id == 42){
							echo "Book To See A Kensington GP";
							$visit_our = "Kensington";
							$see_X = "A Kensington";
							$visit_our_walk = "Kensington";

						}else if($clinic_id == 43){
							echo "Book To See A GP In Battersea";
							$visit_our = "Battersea";
							$see_X = "A Battersea";
							$visit_our_walk = "Battersea";

						}else if($clinic_id == 44){
							echo "Book To See Our Portobello Doctors";
							$visit_our = "Portobello";
							$see_X = "A Portobello";
							$visit_our_walk = "Portobello";

						}else if($clinic_id == 45){
							echo "Book To See A Berkhamsted GP";
							$visit_our = "Berkhamsted";
							$see_X = "A Berkhamsted";
							$visit_our_walk = "Berkhamsted";

						}else if($clinic_id == 46){
							echo "Book To See A Holland Park GP";
							$visit_our = "Holland Park";
							$see_X = "A Holland Park";
							$visit_our_walk = "Holland Park";

						}else if($clinic_id == 47){
							echo "Book To See Our Grosvenor Doctors";
							$visit_our = "Grosvenor";
							$see_X = "A Grosvenor";
							$visit_our_walk = "Grosvenor";

						}else if($clinic_id == 48){
							echo "Book To See A GP In Cambridge";
							$visit_our = "Cambridge";
							$see_X = "A Cambridge";
							$visit_our_walk = "Cambridge";

						}else if($clinic_id == 49){
							echo "Book To See A GP In Edinburgh";
							$visit_our = "Edinburgh";
							$see_X = "An Edinburgh";
							$visit_our_walk = "Edinburgh";

						}else if($clinic_id == 50){
							echo "Book To Visit Our Walk In Centre Bristol";
							$visit_our = "Bristol";
							$see_X = "A Bristol";
							$visit_our_walk = "Bristol";

						}else if($clinic_id == 51){
							echo "Book To See A Woolwich GP";
							$visit_our = "Woolwich";
							$see_X = "A Woolwich";
							$visit_our_walk = "";

						}else if($clinic_id == 52){
							echo "Book To Visit Our Walk In Centre Leeds";
							$visit_our = "Leeds";
							$see_X = "A Leeds";
							$visit_our_walk = "";

						}else if($clinic_id == 53){
							echo "Book To Visit Our Walk In Centre Nottingham";
							$visit_our = "Nottingham";
							$see_X = "A Nottingham";
							$visit_our_walk = "";

						}else if($clinic_id == 54){
							echo "Book To Visit Our Walk In Centre Bradford";
							$visit_our = "Bradford";
							$see_X = "A Bradford";
							$visit_our_walk = "";

						}else if($clinic_id == 55){
							echo "Book To Visit Our Walk In Centre Sheffield";
							$visit_our = "Sheffield";
							$see_X = "A Sheffield";
							$visit_our_walk = "";

						}else if($clinic_id == 56){
							echo "Book To See Our Tufnell Park Doctors";
							$visit_our = "Tufnell Park";
							$see_X = "A Tufnell Park";
							$visit_our_walk = "";

						}else if($clinic_id == 57){
							echo "Book To See Our East Kilbride Doctors";
							$visit_our = "East Kilbride";
							$see_X = "An East Kilbride";
							$visit_our_walk = "";

						}else if($clinic_id == 58){
							echo "Book To See A GP In Victoria";
							$visit_our = "Victoria";
							$see_X = "A Victoria";
							$visit_our_walk = "";

						}else if($clinic_id == 59){
							echo "Book To See A St Johns Wood GP";
							$visit_our = "St Johns Wood";
							$see_X = "A St Johns Wood";
							$visit_our_walk = "";

						}else if($clinic_id == 61){
							echo "Book To See A GP In Oxford";
							$visit_our = "Oxford";
							$see_X = "An Oxford";
							$visit_our_walk = "";

						}else if($clinic_id == 62){
							echo "Book To See A GP In Dundee";
							$visit_our = "Dundee";
							$see_X = "A Dundee";
							$visit_our_walk = "";

						}else if($clinic_id == 63){
							echo "Book To See An Abbey Road GP";
							$visit_our = "Abbey Road";
							$see_X = "An Abbey Road";
							$visit_our_walk = "";

						}else if($clinic_id == 65){
							echo "Book To See A Hyde Park GP";
							$visit_our = "Hyde Park";
							$see_X = "A Hyde Park";
							$visit_our_walk = "";

						}else if($clinic_id == 66){
							echo "Book To Visit Our Sheppey Walk In Centre";
							$visit_our = "Sheppey";
							$see_X = "A Sheppey";
							$visit_our_walk = "";

						}else if($clinic_id == 67){
							echo "Book To Visit Our Walk In Centre Luton";
							$visit_our = "Luton";
							$see_X = "A Luton";
							$visit_our_walk = "";

						}else if($clinic_id == 68){
							echo "Book To See Our Bletchley Doctors";
							$visit_our = "Bletchley";
							$see_X = "A Bletchley";
							$visit_our_walk = "";

						}else{
							echo "";
							$visit_our = "";
						}
					?>

						
				</p>
				
			</div>
			<div class="testimonials-header" >
				<hr class="testimonails-header-line">
				<i class="fa fa-quote-left"></i>
				<hr class="testimonails-header-line">
			</div>
			<div class="testimonials-quotes testimonials-slicky">
				<div>
					<blockquote>
						<p>
							“Excellent service - I was able to get the referral letter I needed.”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/Jacqueline.png');?>">
							<div class="testimony-name"><strong>Jacqueline</strong> <span>received her referral letter</span></div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“I had a great experience! The doctor was very courteous and friendly, and I was able to get a prescription filled right then and there.”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/kelly2.png');?>">
							<div class="testimony-name"><strong>Kelly</strong> <span>received her <br>antibiotics</span></div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Very quick, very thorough consultation on my issue. Very happy with outcome.”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/michael2.png');?>">
							<div class="testimony-name"><strong>Michael</strong> <span>got peace <br>of mind</span></div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“The station was so easy to use and the doctor had great bedside manner.”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/nolan2.png');?>">
							<div class="testimony-name"><strong>Nolan</strong> <span>received his <br>sick note</span></div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“I made the appointment at 3pm and was seen at 3.30pm the same day.  Feeling much better now thanks!”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/trevor2.png');?>">
							<div class="testimony-name"><strong>Trevor</strong> <span>got his <br>prescription refilled</span></div>
						</footer>
					</blockquote>
				</div>
				
			</div>
		</div>
	</section>
	<section id="steps" class="steps newEstService">
		<div class="container">
			<h1>See a Private GP Quickly - 3 Simple Steps</h1>
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/Private-GP-Near-Me-Icon.png');?>">
					<h3>Book Online</h3>
					<p>Book a convenient same day private GP appointment in <?php echo $data['cl_clinic_name'];?></p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/Online-Doctor.png');?>">
					<h3>Visit Our <?php echo $visit_our;?> Clinic</h3>
					<p>Have an online video consultation and full examination with a private doctor at the pharmacy. </p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/Prescription.png');?>">
					<h3>Collect Your Prescription Instantly</h3>
					<p>Your medicine will be available to collect immediately from the same pharmacy.</p>
				</li>
			</ul>
		</div>
		<div id="scrolBokfrm">
	</section>
	<section id="booking" class="text-section bookSec">
		<div class="container">
			
			<div class="booking-wrapper w-show-panel">
				<div class="booking-content show-panel">
					<?php $this->load->view('general/booking-wrapper-clinic')?>
				</div>
			</div>
			<div style="display:none;" >
				<input type="text" name="lat" id="lat" value="">
				<input type="text" name="lng" id="lng" value="">
			</div>
		</div>
	</section>

	<section id="establishment-info">
		<div class="container" id="clinicInfo" >
			<div class="establishment-info" >
				<div class="establishment-meta">
					<div class="establishment-meta-info" >
						<i class="fa fa-map-marker" title="Location"></i>
						<span><?php echo $data['cl_formatted_address'];?></span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-phone" title="Phone Number"></i>
						<span><?php echo $data['cl_phone_number'];?></span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-clock-o" title="Opening Times"></i>
						<span>
							<strong>Opening Times</strong><br>
							<?php echo $data['opening_hours'];?>
						</span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-envelope" title="Email Address"></i>
						<span>
							<a href="mailto:<?php echo $data['cl_email_address'];?>"><?php echo $data['cl_email_address'];?></a>
						</span>
					</div>
				</div>

				<div class="right_establish_cntnt">
					<p><?php echo $data['cl_description'];?></p>
					<div class="innRightEstCntct">
						<a href="javascript:void(0);" onclick="openChat();return false;" class="btn chatteam" id="chatteam">Chat <img src="<?php echo base_url('assets/images/icons/icon-7.png');?>" alt="" ></a>
						<a href="callto:<?php echo $data['cl_phone_number'];?>" class="btn">Call <img src="<?php echo base_url('assets/images/icons/icon-8.png');?>" alt="" ></a>
					</div>
				</div>

				
			</div>
			<div class="establishment-info-photos">
				<?php
				if ($data['1_image']!='' && $data['2_image']!='' && $data['3_image']!='') {
					?>
					<div class="photo-wrapper">
						<?php if($data['1_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['1_image']);?>)"></div>
						<?php } ?>
					</div>
					<div class="photo-wrapper">
						<?php if($data['2_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['2_image']);?>)"></div>
						<?php } ?>
					</div>
					<div class="photo-wrapper">
						<?php if($data['3_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['3_image']);?>)"></div>
						<?php } ?>
					</div>
					<?php
				}elseif ($data['1_image']!='' && $data['2_image']!='') {
					?>
					<div class="photo-wrapper">
						<?php if($data['1_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['1_image']);?>)"></div>
						<?php } ?>
					</div>
					<div class="photo-wrapper">
						<?php if($data['2_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['2_image']);?>)"></div>
						<?php } ?>
					</div>
					<?php
				}else{
					?>
					<div class="photo-wrapper">
						<?php if($data['1_image']!=''){?>
						<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['1_image']);?>)"></div>
						<?php } ?>
					</div>
					<?php
				}
				?>
				
			</div>
			
		</div>
	</section>

	<section id="logos-qa" style="padding-bottom: 6rem;">
		<div class="container">
			<div class="logos-list">
				<img src="<?php echo base_url('assets/images/logo/logo-st.png');?>" title="Secure &amp; trusted">
				<img src="<?php echo base_url('assets/images/logo/logo-gmc.png');?>" title="General Medical Council">
				<img src="<?php echo base_url('assets/images/logo/logo-ico.png');?>" title="Information Commissioner’s Office">
				<img src="<?php echo base_url('assets/images/logo/logo-cqc.png');?>" title="CareQuality Commission">

			</div>
		</div>
	</section>
	

	

	<section id="can-treat" class="treat-section newTreatSec">
		<div class="container">
			<h1 style="">What Can We Help With?</h1>
			<ul class="treat-list">
				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('can_treat','yes');
					$CI->db->where('published','yes');
					$treats = $CI->db->get('what_we_treats')->result_array();
				
					foreach($treats as $t){
				?>
				<li>
					<h3><?php echo $t['name'];?></h3>
					<p><?php echo $t['desc'];?></p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</section>

	<section id="we-can-also">
		<div class="container">
			<div class="we-can-also">
				<img src="<?php echo base_url('assets/images/icons/i-prescription.png');?>">
				<div class="we-can-also-content">
					We can also help to provide prescription requests, sick notes, and specialists referrals, whilst being able to support a range of other symptoms.
				</div>
			</div>
			<div class="row">
				<div class="skipTheWait">
					<a href="#" id="scroll" class="btn s-large">Skip the wait</a>
				</div>
			</div>
		</div>
	</section>

	
</page>
<page id="how-it-works">
	<section id="clinical-station-diagram" class="NewClinicPageDia">
		<div class="container">
			<h1>How We Help You</h1>
			
			
			<div class="clinical-station-diagram">
				<ul class="diagram-list">
					<li class="minHe">
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-1.png)"></div>
						<div class="content">
							<!--<h3>Blood Pressure Cuff</h3>-->
							<h2>No More Waiting</h2>
							<p>See a doctor whenever you<br> want<br>&nbsp;</p>
						</div>
					</li>
					<li class="minHe">
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-2.png)"></div>
						<div class="content">
							<h2>Instant Medication</h2>
							<p>Collect your prescription<br> immediately from the<br> pharmacy</p>
						</div>
					</li>
					<li class="minHe">
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-3.png)"></div>
						<div class="content">
							<h2>No Registration Needed</h2>
							<p>Just book and go with no<br> pre-registration needed<br>&nbsp;</p>
						</div>
					</li>
				</ul>

				<div class="diagram-image-wrapper">
					<img src="<?php echo base_url();?>assets/images/how-it-works/Private-GP-Consultation.jpg">
				</div>

				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-4.png)"></div>
						<div class="content">
							<h2>Sick Notes & Referral Letters</h2>
							<p>No hidden charges for<br> anything else that is required</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-5.png)"></div>
						<div class="content">
							<h2>The Best UK Doctors</h2>
							<p>Hand-picked expert online <br>GPs to help you feel better</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(<?php echo base_url();?>assets/images/icons/icon-6.png)"></div>
						<div class="content">
							<h2>Nationwide Coverage</h2>
							<p>Available from 50<br> convenient locations</p>
						</div>
					</li>
				</ul>
			</div>
			
		</div>
	</section>
	<section id="call-to-action" class="call-to-action">
        <div class="container">
            <h1>See <?php echo $see_X;?> GP Today</h1>
            <p>Visit our <?php echo $visit_our;?> walk in centre to see a private GP</p>
            <a href="javascript:void(0)" id="scroll2" class="btn s-large s-rounded s-inverted">Book now</a>
            <div class="call-to-action-features">
                <span>No more waiting</span>
                <hr class="dot">
                <span>Same day doctor</span>
            </div>
        </div>
    </section>
</page>

<script language="javascript">
	var place, marker;
	var markerArray = {};
	function booking_Map() {		
		var zoom = 7;
		if(typeof globals.lat!=="undefined"){
			place = {
				lat: parseFloat(globals.lat),
				lng: parseFloat(globals.lng)
			};
			zoom = 16;
		}else{
			place = {
				lat: parseFloat(51.5259704),
				lng: parseFloat(-0.1660516)
			};
		}
		map = new google.maps.Map(document.getElementById('booking-map'), {
			scrollwheel: false,
			zoom: zoom,
			center: place,
			draggable: true,
			gestureHandling: 'cooperative'
		});

		markerIcon = new google.maps.MarkerImage(
			'<?php echo base_url('assets/images/map-marker.png');?>',
			new google.maps.Size(32, 32),
			new google.maps.Point(0, 0),
			new google.maps.Point(16, 16),
			new google.maps.Size(32, 32)
		);
		
		<?php
		$CI->db->select('*');
		$result = $CI->db->get('ea_clinics')->result_array();
		$i = 0;
		foreach($result as $r){
		?>
		marker<?php $i;?> = new google.maps.Marker({
			position: {
				lat: parseFloat(<?php echo $r['cl_lat'];?>),
				lng: parseFloat(<?php echo $r['cl_lng'];?>)
			},
			icon: markerIcon,
			map: map
		});
		marker<?php $i;?>.addListener('click', function() {
         	map.setCenter(marker<?php $i;?>.getPosition());
         	$('#booking_tab').trigger('click');
         	loadClinicData(<?php echo $r['id'];?>);
		 	booking_SelectEstablishment();
		 	getAppointmentTimes(<?php echo $r['id'];?>, '<?php echo date('d-m-Y', strtotime('now'));?>');			 	

        });
        markerArray[<?php echo $r['id'];?>] = marker<?php $i;?>;
		<?php 
		$i++;
		} ?>
		
			var directionsService = new google.maps.DirectionsService;
        	var directionsDisplay = new google.maps.DirectionsRenderer;
			
        	directionsDisplay.setMap(map);
			var orignLat =  globals.lat;
			var orignLon = globals.lng;
			var destLat = parseFloat(<?php echo $r['cl_lat'];?>);
			var destLon = parseFloat(<?php echo $r['cl_lng'];?>);						
	}

	function calculateAndDisplayRoute(directionsService, directionsDisplay,orginLat, orginLon,destLat,destLon) {	
        directionsService.route({
          origin: new google.maps.LatLng(orginLat,orginLon),
          destination: new google.maps.LatLng(destLat,destLon),		  
          travelMode: 'DRIVING'
        }, function(response, status) {			
          if (status === 'OK') {			  
            directionsDisplay.setDirections(response);
			var leg = response.routes[0].legs[0];
            makeMarker(leg.start_location, icons.start, "title", map);
            makeMarker(leg.end_location, icons.end, 'title', map);
          } else {
          }			
			function makeMarker(position, icon, title, map) {
        		new google.maps.Marker({
					position: position,
					map: map,
					icon: icon,
					title: title
        		});
    		}
			var icons = {
				start: new google.maps.MarkerImage(
				'http://maps.google.com/mapfiles/ms/micons/blue.png',
				new google.maps.Size(44, 32),
				new google.maps.Point(0, 0),
				new google.maps.Point(22, 32)),
				end: new google.maps.MarkerImage(
				'http://maps.google.com/mapfiles/ms/micons/green.png',
				new google.maps.Size(44, 32),
				new google.maps.Point(0, 0),
				new google.maps.Point(22, 32))
			};
        });
      }
</script>
<script type="text/javascript">
	$(document).ready(function(){ 
	    $('#scroll').click(function(){  
	        $("html, body").animate({ scrollTop: $("#scrolBokfrm").offset().top - 30 }, 700); 
	        return false; 
	    }); 

	    $('#scroll2').click(function(){ 
	        $("html, body").animate({ scrollTop: $("#scrolBokfrm").offset().top -30 }, 700); 
	        return false; 
	    }); 
	    $('#headReviw').click(function(){ 
	    	$(".actHead").removeClass("headActive");
	    	$("#headReviw").addClass("headActive");
	        $("html, body").animate({ scrollTop: $("#Reviews").offset().top + 10 }, 700); 
	        return false; 

	    });
	    $('#headBook').click(function(){ 
	    	$(".actHead").removeClass("headActive");
	    	$("#headBook").addClass("headActive");
	        $("html, body").animate({ scrollTop: $("#scrolBokfrm").offset().top -30 }, 700); 
	        return false; 
	    });
	    $('#headClinic').click(function(){ 
	    	$(".actHead").removeClass("headActive");
	    	$("#headClinic").addClass("headActive");
	        $("html, body").animate({ scrollTop: $("#clinicInfo").offset().top - 120 }, 700); 
	        return false; 
	    });

	});
</script>
<?php $this->load->view('_blocks/footer')?>
