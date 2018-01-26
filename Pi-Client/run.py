import requests
from functions import get_mac
from functions import get_global_ip
from functions import get_local_ip
from functions import location
import pygeoip
from urls import URL_LOGIN
from urls import URL_REG
from server import SS


loop = 'true'
while (loop == 'true'):

	print("=======================================================")
	email = raw_input('Email   :')
	password = raw_input('Password:')
	print("=======================================================")


	payload1 = {'email':email,'password':password}
	
	r1 = requests.post(URL_LOGIN, data=payload1).json()
	#r1 = requests.post(URL_LOGIN, data=payload1)

	if(r1['error']):
		print("Message	 :"+r1['error_msg'])

	else:
		print("***#_User Details_#***")
		print("uid	  :"+r1['uid'])
		print("Name	  :"+r1['user']['name'])
		r_email = r1['user']['email']
		#print(email)
		print("Email	  :"+r1['user']['email'])
		print("created_at:"+r1['user']['created_at'])
		print("updated_at:"+r1['user']['updated_at'])
		loop = 'false'
		mac = get_mac()
		global_ip = get_global_ip()
		local_ip = get_local_ip()
		latitude,longitude = location()
		
		print("=======================================================")
		print("Your MAC Address :"+mac)
		print("Your Global IP	 :"+global_ip)
		print("Your Local IP	 :"+local_ip)
		print("Latitude	 :"+str(latitude))
		print("Longitude	 :"+str(longitude))
		print("=======================================================")

		payload2 = {'mac':mac,'local_ip':local_ip,'global_ip':global_ip,'email':email,'latitude':latitude,'longitude':longitude}
		#print(requests.post(URL_REG, data=payload2))
		#print(requests.post(URL_REG, data=payload2).json())
		#r2 = requests.post(URL_REG, data=payload2)

		r2 = requests.post(URL_REG, data=payload2).json()
		
		if(r2['error']):
			print("Message	 :"+r2['error_msg'])

		else:
			print("***#_Device Details_#***")
			print("Device id :"+r2['device_unique_id'])
			print("Owner	  :"+r2['owner'])
			r_mac = r2['device']['mac']
			print("Mac	  :"+r2['device']['mac'])
			print("Local IP  :"+r2['device']['local_ip'])
			print("Global IP :"+r2['device']['global_ip'])
			print("created_at:"+r2['device']['created_at'])
			print("Latitude  :"+r2['device']['latitude'])
			print("Longitude :"+r2['device']['longitude'])
		print("=======================================================")
		Server = SS()
		Server.create();
