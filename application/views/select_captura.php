<script>
$(document).ready(function(e) {
	  $("a").click(function(e) {
        e.preventDefault();
		window.location = $(this).attr("href")+"/"+$("#inicio").val()+"/"+$("#fin").val();
    });
});
</script>

<div id="content">
<a href="<?= $site ?>/reportes/index" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<form action="<?= $site ?>/reportes/viewgeneral" method="post" data-ajax="false">
    <legend>Seleccione las líneas</legend>
    <p>
      <label for="textfield">Fecha inicial</label><br/>
      <input type="text" name="textfield" id="inicio" class="datepicker" width="250">
    </p>
    <p>
      <label for="textfield2">Fecha final</label><br/>
      <input type="text" name="textfield2" id="fin" class="datepicker" width="250">
    </p>
</form>
<br />
<ul data-role="listview" data-filter="true">
	<?php foreach($capturas as $c) { ?>
	<li> <a href="<?= $site ?>/reportes/view_captura/<?= $c['idcaptura'] ?>" data-transition="flip" data-ajax="false"> <?= isset($c['linea']['nombre'])?$c['linea']['nombre']:""  ?> ejecutada <?= date("d-m-Y", strtotime($c['fecha'])) ?>  </a> </li>
    <?php } ?>
</ul>
</div>