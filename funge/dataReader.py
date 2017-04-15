import serial
import string
import MySQLdb
import pprint

db = MySQLdb.connect(host="localhost", # your host, usually localhost
                     user="root", # your username
                      passwd="root", # your password
                      db="surveystation") # name of the data base
cur = db.cursor()

ser = serial.Serial('/dev/ttyACM1',9600)    # porta arduino, canale (deve essere il medesimo su cui scrive arduino)
while True:
    #try:
    data = ser.readline()
    #except serial.SerialException:
    #    pass
    #except OSError:
    #   pass
    
    arr = data.split()
    #print 'X: ' + arr[0]
    #print '---------------------'
    #print 'Y: ' + arr[1]
    #print '---------------------'
    #print 'Z: ' + arr[2]
    #print '---------------------'
    if len(arr)==3 :
        print("x: "+arr[0]+"; y: "+arr[1]+"; z: "+arr[2])
        cur.execute('INSERT INTO sismografo (Data, Valore_X, Valore_Y, Valore_Z) VALUES (now(), '+arr[0]+', '+arr[1]+', '+ arr[2] + ')')
        db.commit()
