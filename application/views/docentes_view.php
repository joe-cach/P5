<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>ALTAS Y BAJAS - DOCENTES</title>
    </head>
    <style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	table {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
    <body id="container">
        <h2>ALTAS Y BAJAS - DOCENTES</h2>
        <?php
        
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');
            
        ?>
<table border="1"><br>
    <tr><br>
        <form action="<?=base_url("index.php/docentes_controller/add");?>" method="post">
            <td></td>
            <td>
               <input type="email" name="email"/>
            </td>
            <td>
               <input type="text" name="password"/>
            </td>
            <td>
                <input type="text" name="nombre"/>
            </td>
            <td>
                <input type="text" name="apellido"/>
            </td>
            <td>
                <input type="submit" name="submit" value="Dar de alta" />
            </td>
        </form>
    </tr>
<?php
foreach($ver as $fila){
?>
    <tr>
        <td>
            <?=$fila->id_docente;?>
        </td>
        <td>
            <?=$fila->email;?>
        </td>
        <td>
            <?=$fila->password;?>
        </td>
        <td>
            <?=$fila->nombre;?>
        </td>
        <td>
            <?=$fila->apellido;?>
        </td>
        <td>
            <a href="<?=base_url("index.php/docentes_controller/mod/$fila->id_docente")?>">Modificar</a>
            <a href="<?=base_url("index.php/docentes_controller/eliminar/$fila->id_docente")?>">Dar de baja</a>
        </td>
    </tr>
<?php
    
}
?>
</table>

</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

    </body>
</html>