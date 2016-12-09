<html>
<head>
	<title>Programación 3 - 2016</title>
	  
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="imagenes/favicon.ico">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <script src="resources/js/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script src="resources/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <script type="text/javascript" src="js/funcionesAjax.js"></script>
		<script type="text/javascript" src="js/funcionesLogin.js"></script>
		<script type="text/javascript" src="js/funcionesABM.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" onclick="Mostrar('MostrarInicio');">Inicio</a>
	    </div>
	    <div class="collapse navbar-collapse" id="botonesNav">
	      <script type="text/javascript">MostrarBotones()</script>
	    </div>
	  </div>
	</nav>

	<div class="container text-center" id="principal">
	    <script type="text/javascript">Mostrar('MostrarInicio');</script>
	</div>



</body>
</html>