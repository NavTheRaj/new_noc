import mysql.connector
import subprocess
import os

mydb = mysql.connector.connect(
				host="localhost",
				user="root",                    
        passwd="R&D$3rv3r",             
        database="nodedb"
				)   

cur=mydb.cursor()

mydb.autocommit=True

def update_tbl_node(nid,online,snmpindex):
		sql="UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,nid,snmpindex)
		cur.execute(sql)
		



def main():
		fp=open("allnodes","r")
		new=[]
		new=fp.readlines()
		fp.close()
		for line in new:
				hid=line.split()[0]
				hostname=line.split()[1]
				community=line.split()[3]
				vendor=line.split()[2]
				snmpindex=line.split()[4]
				#print(type(snmpindex))
				status=line.split()[5]
				#print("status->",status)
				if status == "0":
						sql="UPDATE tbl_node SET online=0 WHERE hid={}".format(hid)
						cur.execute(sql)
						print("Updating host "+hostname+" as down")
				else:
						if vendor=="cisco":
								new_com="1.3.6.1.4.1.9.9.116.1.4.1.1.5."+snmpindex
								#print(new_com)
								#online=os.system(f"snmpwalk -v2c -c {community} {hostname} {snmpindex} | sed 's/.*INTEGER: //g'")
								online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {new_com} | sed 's/.*INTEGER: //g'",shell=True).decode()
								#CALLING FUNCTION TO UPDATE THE TABLE tbl_node
								#update_tbl_node(hid,online,snmpindex)
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								print("Cisco->Online",online)
						
						elif vendor=="casa":
								new_com="1.3.6.1.4.1.20858.10.12.1.1.1.2."+snmpindex
								online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {new_com} | sed 's/.*Gauge32: //g'",shell=True).decode()
								
								#update_tbl_node(hid,online,snmpindex)
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								print("Casa->Online",online)
						
						elif vendor=="motorola":
								new_com="1.3.6.1.4.1.4981.2.1.2.1.7."+snmpindex
								online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {new_com} | sed 's/.*INTEGER: //g'",shell=True).decode()
								
								update_tbl_node(hid,online,snmpindex)
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								print("Motorola->Online",online)
						
						elif vendor=="arris":
								new_com=".1.3.6.1.4.1.4998.1.1.20.2.27.1.13."+snmpindex
								online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {new_com} | sed 's/.*INTEGER: //g'",shell=True).decode()
								
								#update_tbl_node(hid,online,snmpindex)
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								print("Arris->Online",online)
						
						else:
								new_com="ifOperStatus."+snmpindex
								online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {new_com} | sed 's/.*INTEGER: //g'",shell=True).decode()
								update_tbl_node(hid,1,snmpindex) if "up(1)" in online else update_tbl_node(hid,0,snmpindex)
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								#cur.execute("UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,hid,snmpindex))
								print("Nokia->Online",online)

main()
