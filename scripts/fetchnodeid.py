#This script dumps all the node id into the hostlist file.
#!/home/sagar/areacheck_env/bin/python

import mysql.connector

import csv

mydb=mysql.connector.connect(
		host="localhost",
		user="root",
		passwd="R&D$3rv3r",
		db="nodedb"
		)

cur=mydb.cursor()

fp=open("hostlist.txt","w")

cur.execute("SELECT id,hostname FROM tbl_host ORDER BY id ASC;")

result=cur.fetchall()

myFile=csv.writer(fp) #Writing the fetched data into file as csv 

myFile.writerows(result)

fp.close()
