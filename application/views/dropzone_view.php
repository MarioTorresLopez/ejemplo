<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

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

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<link rel="stylesheet" href="<?=base_url()?>static/css/dropzone.css">
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">		
		<form id="form-multimedia-data" class="dropzone" action="<?=base_url()?>dropzone/subir"> </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	<script src="<?=base_url()?>static/admin/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>static/admin/js/dropzone.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		var dropzoneMultimedia = null;

		jQuery(document).ready(function($) {
			 Dropzone.options.formMultimediaData = {
        		addRemoveLinks : false, 
		        autoDiscover : false,                
		        autoProcessQueue : true,
		        dictDefaultMessage: 'Arrastre su archivo de Excel o de <br />Click aqui',
		        dictRemoveFile : "Eliminar archivo",
		        autoQueue : true,
		        accept : function(file, done) {
		            dropzoneMultimedia = this;
		            if(file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
		                done(); 
		            }
		            else {                        
		                this.removeFile(file);         
		                alert("ERROR EN LA EXTENSION DE ARCHIVO");
		            }                    
		        },
		        success : function(file) {
		            alert(file.name+"\nSubido correctamente");
		            window.setTimeout(function() {  
		                dropzoneMultimedia.removeFile(file);
		            }, 1000);
		        },
		        queuecomplete : function () {
		            alert("Terminado");
		        }
		    }
		});
	</script>
</div>
</body>
</html>
