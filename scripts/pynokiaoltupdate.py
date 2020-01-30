import mysql.connector         
import os                               
mydb = mysql.connector.connect(
                  host="localhost",               
                    user="root",                    
                      passwd="R&D$3rv3r",             
                      database="nodedb"               
                      )  

#os.system("sed -i 's/,/ /g' nokianodeindex")

nodeindex='nokianodeindex'

fp=open(nodeindex,"r+")

line_list=""
line_list = fp.readlines()

for line in line_list:
	line_arr=line.split(",")
	print(line_arr)
