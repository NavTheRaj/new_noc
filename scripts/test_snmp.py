import subprocess

#from subprocess import PIPE,run,STDOUT
#snmpwalk -v2c -c NETMAN gbaluwatar.subisu.net.np ifOperStatus.94371840 | sed 's/.*INTEGER: //g'

import mysql.connector

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

				online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {snmpindex} | sed 's/.*{strip_string}: //g'",shell=True,stderr=subprocess.STDOUT).decode()
				return online

		except subprocess.CalledProcessError as e:
			#	print(e.output)
				return 0


def update_table(nid,online,snmpindex):
		sql="UPDATE tbl_node SET online={} WHERE hid={} AND snmpIndex={}".format(online,nid,snmpindex)
		cur.execute(sql)
		cur.close()

def main():
		hid=22
		community="NETMAN"
		hostname="gbaluwatar.subisu.net.np"
		snmpindex="ifOperStatus.94371840"
		snmp="94371840"
		strip_string="INTEGER"

		online=snmp_walk(community,hostname,snmpindex,strip_string)
		#online=subprocess.check_output(f"snmpwalk -v2c -c {community} {hostname} {snmpindex} | sed 's/.*INTEGER: //g'",shell=True).decode()
		#command = (["snmpwalk"," -v2c","-c","NETMAN","172.31.65.106","ifOperStatus.94371840"])
		#result=subprocess.check_output(command).decode()
		print(online)
		#result = run(command, stdout=PIPE, stderr=PIPE, universal_newlines=True)
		#print(result.returncode, result.stdout, result.stderr)
		update_table(hid,1,snmp) if "up(1)" in online else update_table(hid,0,snmp)


main()
