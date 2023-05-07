public static function onPageSaveComplete($wikiPage,  $user,  $summary,  $flags,  $revisionRecord,  $editResult)
	{


		// Define la dirección IP y el puerto del servidor
		$ip = '192.168.0.20';
		$port = 1234;

		// Crea un socket TCP/IP
		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

		// Conecta el socket al puerto donde el servidor está escuchando
		socket_connect($sock, $ip, $port);

		// Envía un mensaje al servidor
		$page = $wikiPage->getTitle()->getText();
		$message = "La página " . $page . " se guardó correctamente por el usuario: " . $user->getName();
		socket_write($sock, $message, strlen($message));

		// Espera por una respuest

		// Imprime la respuesta recibida

		// Cierra el socket
		socket_close($sock);
	}

