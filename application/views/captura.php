<script>
	jQuery(document).ready(function(e) {
		$("form").submit(function(e) {
            if($("#honor").val() != 1){
				alert("No ha aceptado las condiciones para enviar el formato");
				return false;
			}
        });
	});
</script>

            <div data-role="content">
             <a href="<?= $site ?>/capturas/selector" data-role="button" data-transition="flip">Regresar</a>
                                    <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
              
              <h2> L&iacute;nea: <?= $linea['nombre']; ?></h2>
              
                </div>
                <form action="<?= $site ?>/capturas/save" data-ajax="false" method="post">
                <label for="flip-1">Certifico que los datos capturados son reales de no ser as&iacute; asumo las políticas de la planta</label>
                <select name="honor" id="honor" data-role="slider">
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
                
                <fieldset data-role="controlgroup">
                            <label for="textinput1">
                                Lote: 
                            </label>
                            <input name="lote" id="textinput1" placeholder="" value="" type="text" required />
                        </fieldset>
                        
						
                <input type="hidden" name="idlinea" value="<?= $linea['idlinea'] ?>" />
                <input type="hidden" name="idprod" value="<?= $produccion['idproduccion'] ?>" />
                <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput1">
                                N&uacute;mero de Control (separe por comas)
                            </label>
                            <input name="numControl" id="textinput0" placeholder="" value="" type="text" required />
                        </fieldset>
                    </div>
                    <label for="flip-1">Producción a paso de formado:</label>
						<select name="paso" id="flip-1" data-role="slider">
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
                    
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput1">
                                Piezas Producidas OK
                            </label>
                            <input name="ok" id="textinput1" placeholder="" value="" type="number" required />
                        </fieldset>
                    </div>
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput2">
                                Piezas producidas no OK
                            </label>
                            <input name="tiempo" id="textinput2" placeholder="" value="" type="number" required/>
                        </fieldset>
                    </div>
                    <input type="hidden" name="idcaptura" value="<?= $idproduccion ?>" />
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput2">
                                Tiempo Laborado (horas)
                            </label>
                            <input name="horas_laboradas" id="textinput2" placeholder="" value="" type="number" required max="8"/>
                        </fieldset>
                    </div>

                    
                    
                    <div data-role="collapsible-set">
                        <div data-role="collapsible">
                            <h3>
                                Tiempo muerto en minutos
                            </h3>
                            <div data-role="fieldcontain">
                                <fieldset data-role="controlgroup">
                                    <label for="textinput5">
                                        Herramienta
                                    </label>
                                    <input name="tmh" id="textinput5" placeholder="" value="" type="text" />
                                </fieldset>
                            </div>
                            <div data-role="fieldcontain">
                                <fieldset data-role="controlgroup">
                                    <label for="textinput4">
                                        Prueba Herm&eacute;tica
                                    </label>
                                    <input name="tmp" id="textinput4" placeholder="" value="" type="text" />
                                </fieldset>
                            </div>
                            <div data-role="fieldcontain">
                                <fieldset data-role="controlgroup">
                                    <label for="textinput3">
                                        Material
                                    </label>
                                    <input name="tmm" id="textinput3" placeholder="" value="" type="text" />
                                </fieldset>
                            </div>
                        </div>
                        
                        <div data-role="collapsible" data-collapsed="true">
                            <h3>
                                Formato de Scrap (por componente)
                            </h3>
                            <?php $errcount = count($errores); ?>
                            <table>
                            <tr>
                            	<th>Falla</th>
                                <?php foreach ($errores as $error) { ?>
                                <th> <?= $error['codigo']; ?> <br  /> <?= $error['descripcion']; ?> </th>
                                <?php }?>
                             </tr>
                             <tr>
                             	<th>Componentes</th>
                                <?php for($i = 0; $i < $errcount; $i++) { ?>
                                <th>&nbsp;  </th>
                                <?php } ?>
                             </tr>
                             
                             <?php for($i=1; $i<=20; $i++){ 
							 if(isset($linea['c'.$i])&&$linea['c'.$i]!=""&&$linea['c'.$i]!="0"){
							 ?>
                             
                             <tr>
                             	<td align="center"><?= $linea['c'.$i]?></td>
                                <?php foreach ($errores as $error) { ?>
                                <td> <input type="text" value="" name="c_<?=$i?>_<?=$error['iderror']?>" /> </td>
                                <?php }?>
                             </tr>
                            <?php } //end of if
							} //end for?>
                            </table>
                            
                            
                         </div>
                         <button aria-disabled="false" class="ui-btn-hidden" type="submit" data-theme="a">Guardar</button>
                    </div>
                </form>