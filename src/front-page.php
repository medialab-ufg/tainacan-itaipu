<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<?php get_template_part( 'template-parts/loop-collections-carousel' ); ?>

<div class="front-page mt-5 margin-two-column max-large">
	<h1>Histórico do Museu</h1>
	<hr class="mi-hr title"/>
</div>

<div class="front-page mt-5 py-4 bg-color">
	<section class="front-page-historico mt-2 margin-two-column max-large">
		<h6>As ruinas e o museu</h6>
		<div class="media mt-3">
			<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/fachada.jpg'; ?>" class="mr-3" alt="...">
			<div class="media-body">
				O antigo Recolhimento de Santa Teresa, fundado em 1764, é uma construção em alvenaria de pedra, com conchas dos sambaquis, molduras de cantaria, unidas por óleo de baleia. O corpo principal do prédio ainda permanece com todas as suas características. Sua planta é um retângulo, medindo 46,40 metros de comprimento por 26,60 metros de largura. Há predominância das linhas horizontais, devido a pouca altura do pé direito e a grande largura dos vãos, características que criam um aspecto de calma e solidez.
				Não existe simetria no conjunto, mas há elementos dispostos simetricamente em relação à entrada principal, que parece ser o centro de uma composição que não chegou a seu fim. A área conta com sete pátios abertos, dos quais existe a certeza de pelo menos um ter sido coberto por telhado. O prédio foi tombado em 1955 pelo Departamento do Patrimônio Histórico e Artístico Nacional (DPHAN) e em 1968 iniciaram-se as obras de consolidação e conservação-restauração da capela e das paredes de rocha das muralhas. As aberturas existentes em suas paredes foram vedadas e a desocupação de seu interior foi efetuada.
			</div>
		</div>
	</section>
</div>

<div class="front-page mt-5 margin-two-column max-large">
	<h1>Exposições</h1>
	<hr class="mi-hr title"/>
	<section class="front-page-exposicoes mt-5 margin-one-column">
		<p>
			Quando o Museu de Arqueologia de Itaipu foi criado em 1977, inaugurou-se a exposição de longa duração “Aspectos da pré-história do litoral do Estado do Rio de Janeiro”. Era uma exposição com abordagem arqueológica, que não retratava a memória mais recente daquela comunidade de pescadores que tanto desejou preservar a região e seus monumentos históricos.
		</p>
		<p>
			Com o passar dos anos, essa exposição de caráter científico e sisuda – afastada da realidade cotidiana daquela comunidade que vivia tanto da pesca quanto da venda de alimentos, água, protetores solares, cangas e biquínis na praia – pairava sobre suas cabeças, alheia	às suas demandas e aos seus usos sociais. Em contrapartida, havia uma passividade do público em relação àquele acervo e o museu começou a ver a comunidade, que outrora pedira por sua criação, afastar-se dele. Os ossos de oito mil anos já não lhes diziam mais nada.
		</p>
		<p>
			Dessa forma, a nova exposição do museu, “Percursos do Tempo – Revelando Itaipu”, (inaugurada em janeiro de 2010) dá início a um novo discurso museológico e tenta fazer uma aproximação do museu com a comunidade. Ali não há unicamente um edifício a ser visitado, mas sim um território – que é de todos – e compreende as ruínas do antigo Recolhimento de Santa Teresa, a Duna Grande, a praia	e o Parque Estadual da Serra da Tiririca. Ali não há apenas coleções arqueológicas a serem contempladas, mas um patrimônio arqueológico, arquitetônico e ecológico, que é nacional e comunitário.
		</p>
		<p>
			O museu não deseja apenas um público formado por turistas e visitantes de outros bairros, mas também uma comunidade participativa. O museu não tenta promover apenas uma ação educativa na área arqueológica e histórica, mas também na área do ecodesenvolvimento, de onde é tirado o sustento econômico daquela comunidade. Ou seja, o museu não quer falar apenas do ontem, mas quer tocar também no hoje e no amanhã.
		</p>
		<p>
			Assim, a exposição “Percursos do Tempo” insere essa comunidade e seus antepassados (não apenas os sambaquieiros) nos percursos do tempo de Itaipu. Os modos de vida e de sustento atual também fazem parte do tempo, e isso reaproxima uma população que estava afastada e desinteressada do museu. Ademais, essa é uma perspectiva de trabalho que tem como foco a multidisciplinaridade das atividades educativas, majoritariamente nas áreas de história, geografia, biologia e química e arqueologia.
		</p>
	</section>
</div>

<div class="front-page mt-5 pb-5 max-large">
	<div class="container-fluid front-page-grid p-0 m-0">
		<div class="row m-0">
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
		</div>
	</div>
</div>

<div class="front-page mt-5 margin-two-column max-large">
	<h1>Planeje sua visita</h1>
	<hr class="mi-hr title"/>
</div>

<section class="front-page mt-5"></section>

<?php get_footer();
