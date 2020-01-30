#!/home/sagar/areacheck_env/bin/python
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

def snmp_walk(community,hostname,snmpindex,strip_string):
    try:

        online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {snmpindex} | sed 's/.*{strip_string}: //g'",shell=True).decode()
        return online

    except subprocess.CalledProcessError as e:
      # print(e.output)
        return 0


def update_tbl_node(nid,online,snmpindex):
		sql="UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,nid,snmpindex)
		try:
				cur.execute(sql)
		except mysql.connector.Error as err:
				print("Error occurred at hid->",nid,"and snmpIndex->",snmpindex)
				print(err)
				print("Error Code:", err.errno)
				print("SQLSTATE", err.sqlstate)
				print("Message", err.msg)


def main():
		fp=open("/home/sagar/projects/new_noc/scripts/allnodes","r")
		new=[]
		new=fp.readlines()
		fp.close()
		
		for line in new:
				
				hid=line.split()[0]
				hostname=line.split()[1]
				community=line.split()[3]
				vendor=line.split()[2]
				snmpindex=line.split()[4]
				status=line.split()[5]
				
				strip_strx="INTEGER"
				strip_stry="Gauge32"
				
				if status == "0":
						sql="UPDATE tbl_node SET online=0 WHERE hid={}".format(hid)
						cur.execute(sql)
						print("Updating host "+hostname+" as down")
				
				else:
						if vendor=="cisco":
								new_com="1.3.6.1.4.1.9.9.116.1.4.1.1.5."+snmpindex
								online=snmp_walk(community,hostname,new_com,strip_strx)
								
								#CALLING FUNCTION TO UPDATE THE TABLE tbl_node
								# update_tbl_node(hid,online,snmpindex)
								print(f"{hostname} Cisco->Online",online)
						
						elif vendor=="casa":
								new_com="1.3.6.1.4.1.20858.10.12.1.1.1.2."+snmpindex
								online=snmp_walk(community,hostname,new_com,strip_stry)
								
								# update_tbl_node(hid,online,snmpindex)
								print(f"{hostname} Casa->Online",online)
						
						elif vendor=="motorola":
								new_com="1.3.6.1.4.1.4981.2.1.2.1.7."+snmpindex
								online=snmp_walk(community,hostname,new_com,strip_strx)
								
								# update_tbl_node(hid,online,snmpindex)
								print(f"{hostname} Motorola->Online",online)
						
						elif vendor=="arris":
								new_com=".1.3.6.1.4.1.4998.1.1.20.2.27.1.13."+snmpindex
								online=snmp_walk(community,hostname,new_com,strip_strx)
								
								# update_tbl_node(hid,online,snmpindex)
								print("Arris->Online",online)
						
						else:
								new_com="ifOperStatus."+snmpindex
								online=snmp_walk(community,hostname,new_com,strip_strx)
								# update_tbl_node(hid,1,snmpindex) if "up(1)" in online else update_tbl_node(hid,0,snmpindex)
								print(f"{hostname} Nokia->Online",online)
main()
