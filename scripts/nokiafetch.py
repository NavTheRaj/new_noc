#This scripts fetches the data from database for the vendor =>nokia only

import csv
import mysql.connector

mydb = mysql.connector.connect(
                  host="localhost",               
                    user="root",                    
                      passwd="R&D$3rv3r",             
                      database="nodedb"               
                     )   


fp = open("nokianodeindex","w");

cur = mydb.cursor()

cur.execute("select tbl_host.id,tbl_host.hostname,tbl_node.snmpIndex,tbl_host.community from tbl_node JOIN tbl_host on tbl_host.id=tbl_node.hid where vendor='nokia'")

result=cur.fetchall()

myFile = csv.writer(fp)
myFile.writerows(result)

fp.close()
