<?php if($opcionaisxk >=1){ ?>
<?php
$qnts  = $connect->query("SELECT * FROM grupos WHERE Id='".$opcionaisxl->idgrupo."' AND obrigatorio='3' AND status='1'");
$qnts  = $qnts->fetch(PDO::FETCH_OBJ);
?>
		<hr>
		<div style="color:#CC3300" class="tx-14"><i class="fa fa-arrow-right mg-r-5"></i> Escolha até <?php print $qnts->quantidade; ?> sabores<span style="color:#FF0000"> *</span></div>
			<p style="color:#CC3300" class="tx-10">- Será cobrado o maior valor do item selecionado.</p>
			<center class="tx-12" style="color:#FF0000" id="Mensagemmeioameio"></center>
			<center class="tx-12" style="color:#FF0000" id="Mensagemmeioameiox"></center>
			<div class="row mg-t-10">
					<?php
					$grupomeio  = $connect->query("SELECT * FROM grupos WHERE Id='".$opcionaisxl->idgrupo."' AND obrigatorio='3' AND status='1'");
					$grupomeios	= $grupomeio->fetch(PDO::FETCH_OBJ);
					$opcionaismeio  = $connect->query("SELECT * FROM opcionais WHERE idg='".$grupomeios->Id."' AND status='1'");
					while ($opcionaismeios = $opcionaismeio->fetch(PDO::FETCH_OBJ)) { 
					?>
					<div class="col-8">
					<input type="checkbox" name="meioameios[]" id="idmeioameio" value="<?php print $opcionaismeios->opnome; ?>,<?php print $opcionaismeios->valor;?>"> <span class="tx-14"><?php print $opcionaismeios->opnome; ?></span>
					
					<?php if($opcionaismeios->opdescricao != "N") { ?>
					<p class="tx-10" style="color:#333333">- <?php print $opcionaismeios->opdescricao; ?></p>
					<?php } ?>
					
					</div>
					
					
					<div class="col-4 tx-13 mg-t-10">R$: <?php print $opcionaismeios->valor; ?>
					</div>
				<?php } ?>	 
			</div>
			<script>
				$( document ).ready( function( )
					{
						var NumeroMaximo = <?php print $qnts->quantidade; ?>;
						$( "input[id='idmeioameio']" ).click( function( )
							{
							$( "#Mensagemmeioameio" ).empty( );
							if( $( "input[id='idmeioameio']" ).filter( ':checked' ).size( ) > NumeroMaximo )
							{
						$( '#Mensagemmeioameio' ).html( 'Máximo de  ' + NumeroMaximo + ' sabores.');
							return false;
						
						} else{

							var NumeroMinimo = <?php print $qnts->quantidade_minima; ?>;
						$( "input[id='idmeioameio']" ).click( function( )
							{
							$( "#Mensagemmeioameio" ).empty( );
							if( $( "input[id='idmeioameio']" ).filter( ':checked' ).size( ) > NumeroMaximo )
							{
						$( '#Mensagemmeioameio' ).html( 'Mínimo de  ' + NumeroMinimo + ' sabores.');
							return false;

					} )
				} );
			</script>	

<?php } ?>