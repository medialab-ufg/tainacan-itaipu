<input type="hidden" name="destaque_custom_box" id="destaque_custom_box" value="<?php echo $nonce; ?>" display="none" />
	
<style>
	table#form_destaque_home tr {
		height: 40px;
		line-height: 18px;
	}
	
	table#form_destaque_home tr td{
		padding-top: 3px;
	}
	
	table#form_destaque_home tr td input{
		margin-right: 10px;
	}
</style>

<table width="90%" id="form_destaque_home">
	<tr>
		<td width="35%">
			<label for="destaque-url">URL</label>
		</td>
		<td width="65%">
			<input type="text" id="destaque_url" name="destaque[url]" style="width:100%;" value="<?php echo esc_url($destaqueurl); ?>" />
		</td>
	</tr>
</table>