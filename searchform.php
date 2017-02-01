<!--BEGIN #searchform-->
<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php _e('To search type and hit enter', 'tophica') ?>" onfocus="if(this.value=='<?php _e('To search type and hit enter', 'tophica') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('To search type and hit enter', 'tophica') ?>';" />
	</fieldset>
<!--END #searchform-->
</form>