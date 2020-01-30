#!/home/sagar/areacheck_env/bin/python
import os
fp=open("/home/sagar/projects/new_noc/scripts/hostlist.txt","r")

os.system("sed -i 's/,/ /g' /home/sagar/projects/new_noc/scripts/allnodes")
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
allnodes = os.path.join(BASE_DIR,"allnodes")
tempfile = os.path.join(BASE_DIR,"tempfile")
hostlist=fp.readlines()

for line in hostlist:
		host_id = line.split(',')[0]
		hostname = line.split(',')[1]
		print(hostname)
		response = os.system('fping '+hostname)

		if response == 0:
				os.system("awk '$1=="+host_id+"{$6='1';}1' " + allnodes + ">>" +tempfile + " && mv  " + tempfile +" " + allnodes)
		else:
				os.system("awk '$1=="+host_id+"{$6='0';}1' " + allnodes + ">>" +tempfile + " && mv  " + tempfile +" " + allnodes)

fp.close()
