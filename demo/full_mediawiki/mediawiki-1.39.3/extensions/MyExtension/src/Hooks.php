<?php

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @file
 */

namespace MediaWiki\Extension\BoilerPlate;

class Hooks implements \MediaWiki\Hook\BeforePageDisplayHook
{

	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
	 * @param \OutputPage $out
	 * @param \Skin $skin
	 */
	public function onBeforePageDisplay($out, $skin): void
	{
		$config = $out->getConfig();
		if ($config->get('BoilerPlateVandalizeEachPage')) {
			$out->addModules('oojs-ui-core');
			$out->addHTML(\Html::element('p', [], 'BoilerPlate '));


			// Agregar un mensaje de éxito

			$out->addHTML("La página  se guardó de locos correctamente.");
		}
	}
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
}
