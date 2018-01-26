def get_mac():
	import netifaces
	#print(netifaces.interfaces())
	#print(netifaces.ifaddresses('lo')[netifaces.AF_LINK])
	#print(netifaces.ifaddresses('wlp2s0b1')[netifaces.AF_LINK])
	#print(netifaces.ifaddresses('enp3s0')[netifaces.AF_LINK])
	a=netifaces.ifaddresses('wlp2s0b1')[netifaces.AF_LINK]
	#a=netifaces.ifaddresses('ppp0')[netifaces.AF_LINK]
	#pop the object from list using pop() method
	b=a.pop()
	#get attribute value from object using get() method
	c=b.get('addr')
	return (c)

def get_global_ip():
	#pip install pif(public ip)
	from pif import get_public_ip
	return(get_public_ip())

def get_local_ip():
	#pip install netifaces(local ip)
	import netifaces as ni
	ni.ifaddresses('wlp2s0b1')
	#ni.ifaddresses('ppp0')
	ip = ni.ifaddresses('wlp2s0b1')[ni.AF_INET][0]['addr']
	#ip = ni.ifaddresses('ppp0')[ni.AF_INET][0]['addr']
	return(ip)

def location():
	import pygeoip
	g = pygeoip.GeoIP('GeoLiteCity.dat')
	ip = get_global_ip()
	latitude=g.record_by_addr(ip)['latitude']
	longitude=g.record_by_addr(ip)['longitude']
	#latitude =str(latitude).decode('utf8')
	#longitude =str(longitude).decode('utf8')
	return (latitude,longitude)


