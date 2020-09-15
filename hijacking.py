import socket
import sys
sessid=sys.argv[1]
attack=socket.socket(socket.AF_INET,socket.SOCK_STREAM);
attack.connect(('localhost',80))
http_headers=f"POST /env.php HTTP/1.1\r\nHost: 127.0.0.1\r\nCookie:PHPSESSID={sessid}\r\nConnection: Close\r\n\r\n"
#http_headers="GET /env.php HTTP/1.1\r\nHost: localhost\r\nConnection: Close\r\n\r\n"
attack.send(bytes(http_headers,'us-ascii'))
print(attack.recv(1024).decode('us-ascii'))
attack.close()
