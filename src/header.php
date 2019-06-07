<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
        <ul id="menu-barra-temp" style="list-style:none;">
            <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
                <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
            </li>
            <li>
                <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
            </li>
        </ul>
    </div>
	<!-- MENU DE ACESSIBILIDADE -->
	<div class="accessibility-bar">
		<nav class="container">
			<ul class="accessibility-shortcuts" role="menubar">
				<li role="menuitem"><a href="#content" accesskey="c"><span>c</span> Ir para o conteúdo</a></li>
				<li role="menuitem"><a href="#menubelowHeader" accesskey="m"><span>m</span> Ir para o menu</a></li>
				<li role="menuitem"><a href="#s" accesskey="b"><span>b</span> Ir para a busca</a></li>
				<li role="menuitem"><a href="#footer" accesskey="r"><span>r</span> Ir para o rodapé</a></li>
			</ul>

			<ul class="accessibility-options" role="menubar">
				<li role="menuitem">
					<span>Fonte</span>
					<button type="button" class="button-text-minus" accesskey="5">A-</button>
					<button type="button" class="button-text-default" accesskey="6">A</button>
					<button type="button" class="button-text-plus" accesskey="7">A+</button>
				</li>
				<li role="menuitem">
					<span>Contraste</span>
					<button type="button" class="button-high-contrast" accesskey="8">Alto Contraste</button>
				</li>
			</ul>
		</nav>
	</div>

	<!-- AVISO DE ERRO CASO O JS ESTEJA DESATIVADO OU NÃO ESTEJA FUNCIONANDO -->
	<noscript>
		<span>Seu navegador não tem suporte a JavaScript ou o mesmo está desativado.</span>
    </noscript>
    
	<nav class="navbar navbar-expand-md navbar-light bg-white menu-shadow px-0">
		<div class="container-fluid max-large px-0 margin-one-column" id="topNavbar">
			<?php echo tainacan_get_logo(); ?>
			<div class="btn-group ml-auto"> 
					<form class="form-horizontal my-2 my-md-0 tainacan-search-form d-none d-md-block" [formGroup]="searchForm" role="form" (keyup.enter)="onSubmit()" action="<?php echo home_url( '/' ); ?>">
						<div class="input-group">
							<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search', 'tainacan-interface' ); ?>" class="form-control" formControlName="searchText" size="50">
							<span class="text-midnight-blue input-group-btn tainacan-icon tainacan-icon-search form-control-feedback"></span>
						</div>
					</form>
					<div class="dropdown tainacan-form-dropdown d-md-none">
						<a class="btn btn-link text-midnight-blue px-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="tainacan-icon tainacan-icon-search"></i></a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<?php get_search_form(); ?>
						</div>
					</div>
			</div>
		</div>
	</nav>

	<a href="javascript:" id="return-to-top"><i class="tainacan-icon tainacan-icon-arrowup"></i></a>

	<?php get_template_part( 'template-parts/menubellowbanner' ); ?>