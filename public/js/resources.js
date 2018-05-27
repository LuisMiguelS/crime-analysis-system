$(document).ready(function () {
	
	/* Notificaciones */

	function alert ()
	{
		$.toast({
	        heading: '¡Oh, espera!',
	        text: 'Debes ingresar un número de placa para proseguir.',
	        position: 'top-right',
	        loaderBg: '#bf441d',
	        icon: 'error',
	        hideAfter: 7000,
	        stack: 1
	    });
	}
});