<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div>
    	<ul class="menu">
    		<li class="fg-button ui-state-default sf_button-toggleable"><a href="<?php echo url_for("AbstractClass/classes"); ?>">Planilla de clases</a></li>
	      	<li class="fg-button ui-state-default sf_button-toggleable"><a href="<?php echo url_for("Client/index"); ?>">Alumnos</a></li>
	      	<li class="fg-button ui-state-default sf_button-toggleable"><a href="<?php echo url_for("Coach/index"); ?>">Profesores</a></li>
	      	<li class="fg-button ui-state-default sf_button-toggleable"><a href="<?php echo url_for("AbstractClass/index"); ?>">Clases</a></li>
	     	<li class="fg-button ui-state-default sf_button-toggleable"><a href="<?php echo url_for("Place/index"); ?>">Piletas y lugares</a></li>
	      	<li class="fg-button ui-state-default sf_button-toggleable" ><a href="<?php echo url_for("ClassType/index"); ?>">Categorias de clases</a></li>
      	</ul>
    </div>
    
    <hr>
    <?php echo $sf_content ?>
  </body>
</html>
