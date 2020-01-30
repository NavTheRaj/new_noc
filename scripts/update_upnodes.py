import mysql.connector
import csv

mydb = mysql.connector.connect(
		  host="localhost",
		    user="root",
		      passwd="R&D$3rv3r",
		       database="nodedb"
		      )

mydb.autocommit=True

cur=mydb.cursor(buffered=True)

fup=open("upnodelist","r")

upnodes=fup.read().splitlines()

fall=open("allopennodes.txt","w")

farris=open("newarrisnode.txt","w+")

fnokia=open("newnokianode.txt","w+")

fcasa=open("newcasanode.txt","w+")

fmoto=open("newmotorola.txt","w+")

fcisco=open("newcisconode.txt","w+")


for num in upnodes:
		allsql="SELECT n.hid,h.hostname,h.community,h.vendor,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE n.hid={}".format(num) 
	#FOR NOKIA NODES WHICH ARE IN UP STATE
		nokiasql="SELECT n.hid,h.hostname,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE h.vendor='nokia' and n.hid={}".format(num)   
 
	#FOR CASA NODES WHICH ARE IN UP STATE
 		casasql="SELECT n.hid,h.hostname,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE h.vendor='casa' and n.hid={}".format(num)

	#FOR CISCO NODES WHICH ARE IN UP STATE
		ciscosql="SELECT n.hid,h.hostname,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE h.vendor='cisco' and n.hid={}".format(num) 
	#FOR MOTOROLA NODES WHICH ARE IN UP STATE
		motosql="SELECT n.hid,h.hostname,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE h.vendor='motorola' and n.hid={}".format(num) 
	#FOR ARRIS  NODES WHICH ARE IN UP STATE
		arrisql="SELECT n.hid,h.hostname,n.snmpIndex FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE h.vendor='arris' and n.hid={}".format(num) 

		cur.execute(allsql)
		allfetch=cur.fetchall()
		allfile = csv.writer(fall)
		allfile.writerows(allfetch)
		#CREATING UP NODE CSV FILE FOR NOKIA
		cur.execute(nokiasql)
		nokiafetch = cur.fetchall()
		nokiafile = csv.writer(fnokia)
		nokiafile.writerows(nokiafetch)

	#CREATING UP NODE CSV FILE FOR CASA
		cur.execute(casasql)
		casafetch = cur.fetchall()
		casafile = csv.writer(fcasa)
		casafile.writerows(casafetch)
	
	#CREATING UP NODE CSV FILE FOR ARRIS
		cur.execute(arrisql)
		arrisfetch = cur.fetchall()
		arrisfile = csv.writer(farris)
		arrisfile.writerows(arrisfetch)
	
	#CREATING UP NODE CSV FILE FOR MOTOROLA
		cur.execute(motosql)
		motofetch = cur.fetchall()
		motofile = csv.writer(fmoto)
		motofile.writerows(motofetch)

        #CREATING UP NODE CSV FILE FOR MOTOROLA
		cur.execute(ciscosql)
		ciscofetch = cur.fetchall()
		ciscofile = csv.writer(fcisco)
		ciscofile.writerows(ciscofetch)


fall.close()

farris.close()

fcasa.close()

fmoto.close()

fcisco.close()

fnokia.close()

cur.close()
