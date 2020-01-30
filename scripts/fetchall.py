#!/home/sagar/areacheck_env/bin/python

import mysql.connector

import csv

import os

mydb=mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="R&D$3rv3r",
    db="nodedb"
    )

cur=mydb.cursor()

fp=open("allnodes","w")

cur.execute("SELECT n.hid,h.hostname,h.vendor,h.community,n.snmpIndex,h.id FROM tbl_host h JOIN tbl_node n ON h.id=n.hid WHERE n.status!=0 ORDER BY n.hid ASC;")

result=cur.fetchall()

myFile=csv.writer(fp) #Writing the fetched data into file as csv 

myFile.writerows(result)

fp.close()

