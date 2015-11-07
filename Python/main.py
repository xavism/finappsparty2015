#!/usr/bin/python
from sense_hat import SenseHat
from time import sleep
import json
import urllib, urllib2

sense = SenseHat()

red = (255, 0, 0)
green = (0, 255, 0)
sense.clear(green)

while True:
    temp = sense.get_temperature()
    print("\nTemperature: %s C" % temp)
    humidity = sense.get_humidity()
    print("Humidity: %s %%rH" % humidity)

    '''
    params = {
        'data': [
            {
                'id': '1',
                'value': str(temp)
            },
            {
                'id': '2',
                'value': str(humidity)
            }
        ]
    }'''

    data = urllib.urlencode({'sens1': str(temp), 'sens2': str(humidity)})

    #req = urllib2.Request('http://192.168.10.25/bdapi/send-data.php')
    #req = urllib2.Request('http://46.101.139.161/bdapi/send-data.php')
    #req.add_header('Content-Type', 'application/json')

    response = urllib2.urlopen('http://46.101.139.161/bdapi/send-data.php', data=data)
    resp = response.read()
    response.close()

    if "ok" in resp:
        sense.clear(green)
    else:
        sense.clear(red)

    sleep(10)