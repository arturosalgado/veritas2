<script src="<?=$js?>/jquerymobile.js"></script>

<script>
$(document).ready(function(e) {
	  $("a").click(function(e) {
        e.preventDefault();
		window.location = $(this).attr("href")+"/"+$("#inicio").val()+"/"+$("#fin").val();
    });
});
</script>


<script>
$(document).ready(function(){
    
        var temp;
        var curr_text; 
       $('#filterable-input').keyup(function(){
           //alert('fire');
           
           
           
           temp = $(this).val();
           
           
           
           temp = temp.toUpperCase();
           
           
         
           
           
           
           console.log(temp);
                $(".ui-collapsible").each(function(i){

             //  $(this).css("border","2px solid red");

               var object = $(this);

               var childrenMatch = 0;


               object.find("li a").each(function(){

                        curr_text = $(this).text();
                       // console.log(curr_text);
                        //console.log(temp);
                        
                         
                          if (  curr_text.indexOf(temp) > -1)
                                {
                                   // $(this).css("border","2px solid red");
                                    $(this).closest("li").show();
                                    //console.log("MATCH::::");
                                    //
                                    //
                                    //$(this).closest(".ui-collapsible").css("border","1px solid red");
                                    childrenMatch++;
                                }
                          else 
                          {
                                $(this).closest("li").hide();
                                //$(this).css("border","2px solid blue");
                              // $(this).closest(".ui-collapsible").css("border","1px solid black");
                              
                          }
        
                        
               });
               
               
               if (childrenMatch>0)
               {
                   $(this).show();
               }    
               else
               {
                   $(this).hide();
               }

           });
           
           
          
           
       });
         
    
    
      
    
    
});

</script>

<link rel="stylesheet" type="text/css" href="<?= $css ?>/jquerymobile.css" />
<a href="<?= $site ?>/reportes/index" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<form action="<?= $site ?>/reportes/viewgeneral" method="post" data-ajax="false">
    <legend>Seleccione las líneas</legend>
    
    <p>
        <input type="text" data-type="search" id="filterable-input">
    </p>
    
    <p>
      <label for="textfield">Fecha inicial</label><br/>
      <input type="text" name="textfield" id="inicio" class="datepicker" width="250">
    </p>
    <p>
      <label for="textfield2">Fecha final</label><br/>
      <input type="text" name="textfield2" id="fin" class="datepicker" width="250">
    </p>
</form>


<?php foreach($proyectos as $proyecto=>$lineas){ ?>
<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d">
<h4><?= $proyecto ?></h4>
<ul data-role="listview">
	<li data-ajax="false"><a href="<?= $site ?>/reportes/proyecto/<?= $proyecto ?>" data-ajax="false">Todos</a></li>
    <?php foreach($lineas as $linea) { ?>
    	<li data-ajax="false"><a href="<?= $site ?>/reportes/viewgeneral/<?= $linea['idlinea']?>" data-ajax="false"><?= $linea['nombre'] ?></a></li>
    <?php } ?>
</ul>
</div>
<?php } ?>

