<input type="hidden" name="informacoes_front_custom_box" id="informacoes_front_custom_box" value="<?php echo $nonce; ?>" display="none" />
	
<style>
	table#form_informacoes_front tr {
		height: 40px;
		line-height: 18px;
	}
	
	table#form_informacoes_front tr td{
		padding-top: 3px;
	}
	
	table#form_informacoes_front tr td input{
		margin-right: 10px;
	}
</style>

<table width="90%" id="form_informacoes_front">
	<tr>
		<td width="35%">
			<label for="destaque-url">Telefone</label>
		</td>
		<td width="65%">
			<input type="text" id="telefone_front" name="informacoes[telefone]" style="width:100%;" value="<?php echo esc_attr($telefone_front); ?>" />
		</td>
	</tr>
	<tr>
		<td width="35%">
			<label for="destaque-url">Endereço</label>
		</td>
		<td width="65%">
			<input type="text" id="endereco_front" name="informacoes[endereco]" style="width:100%;" value="<?php echo esc_attr($endereco_front); ?>" />
		</td>
	</tr>
	<tr>
		<td width="35%">
			<label for="destaque-url">Cep</label>
		</td>
		<td width="65%">
			<input type="text" id="cep_front" name="informacoes[cep]" style="width:100%;" value="<?php echo esc_attr($cep_front); ?>" />
		</td>
	</tr>
    <tr>
        <td width="35%">
            <label for="destaque-url">Facebook URL</label>
        </td>
        <td width="65%">
            <input type="text" id="facebook_front" name="informacoes[facebook]" style="width:100%;" value="<?php echo esc_attr($facebook_front); ?>" />
        </td>
    </tr>
</table>