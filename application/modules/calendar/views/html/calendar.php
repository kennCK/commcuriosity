<link rel="stylesheet" href="<?php echo base_url().'assets/css/calendar/calendar.css';?>" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/calendar/calendar_date_picker.css';?>" media="screen"/>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui-datepicker.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/calendar/calendar.js';?>"></script>
					<script>
							$('#calendar-date-picker').datepicker({
								inline: true,
								firstDay: 1,
								showOtherMonths: true,
								dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
							});
					</script>

<meta name="robots" content="noindex,follow" />
<div class="calendar-page-container">
		<div class="calendar-p-header">
			<div id="calendar-main-menu">
			<img src="<?php echo base_url().'assets/images/icons/ic_menu.png';?>" height="100%" width="100%" id="calendar-menu-content"/>
			</div>
		</div>
		<div class="calendar-p-body">
			<div id="calendar-date-picker-holder">
				<div id="calendar-date-picker">
				</div>
			</div>
			<div id="calendar-content-display-holder"></div>
		</div>
		<div class="calendar-p-footer"></div>
</div>
<div class="calendar-page-overlay">
</div>