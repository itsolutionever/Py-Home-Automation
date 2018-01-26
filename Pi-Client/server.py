class SS():
    
	def __init__(self):
		import socket
		import sys
		HOST = '' #this is your localhost
		PORT=1998
		#PORT=input('Enter Port Number:')
		s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		print 'socket created'
		#Bind socket to Host and Port
		try:
		    s.bind((HOST, PORT))
		except socket.error as err:
		    print 'Bind Failed, Error Code: ' + str(err[0]) + ', Message: ' + err[1]
		    sys.exit()
		print 'Socket Bind Success!'
		#listen(): This method sets up and start TCP listener.
		s.listen(10)
		print 'Socket is now listening'
		while 1:
		    conn, addr = s.accept()
		    #print 'Connect with ' + addr[0] + ':' + str(addr[1])
		    buf = conn.recv(5000)
		    print type(buf)
		    print buf

		    #write all conditions here
		    if buf == 'vasu':
		    	print("Hello, VASU How are you??")
		    if buf == 'exit':
		    	break

		s.close()
		sys.exit()



