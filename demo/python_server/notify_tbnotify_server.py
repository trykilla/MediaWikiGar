#!/usr/bin/python3

import socket

# Define la dirección IP y el puerto del servidor
ip = '192.168.0.20'
port = 1234

# Crea un socket TCP/IP
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Asocia el socket a una dirección IP y un puerto
sock.bind((ip, port))

# Escucha por conexiones entrantes
sock.listen(1)

print(f'El servidor está escuchando en {ip}:{port}')

while True:
    # Espera por una conexión entrante
    connection, address = sock.accept()
    print(f'Conexión entrante desde {address}')

    # Lee los datos recibidos y envía una respuesta
    data = connection.recv(1024)
    if data:
        message = 'Mensaje recibido: ' + data.decode()
        connection.sendall(message.encode())

        # Ejecuta la llamada al sistema notify-send
        import os
        os.system(f'tbnotify_send "{message}"')

    # Cierra la conexión
    connection.close()
