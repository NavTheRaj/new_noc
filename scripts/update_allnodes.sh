#!/bin/bash
server='localhost'
db='nodedb'
username='root'
password='R&D$3rv3r'
new='1'
#nodeindex="allnodes"

cat allnodes | while read id hostname vendor community snmpindex status
do
		if ["$status" = $new] 
		then
		echo $status
		fi
		
	#if [$status=="1"]
	#then
	#		echo "Up!"
			 #mysql -u $username -p$password $db <<EOF
			 #update tbl_node set online=0 where snmpIndex=$snmpindex and hid=$id;
			 #EOF
 
	 #else
			 #onlinemodem=`snmpwalk -v2c -c incacmtsread $hostname .1.3.6.1.4.1.4998.1.1.20.2.27.1.13.$snmpindex | sed 's/.*INTEGER: //g'`
		#	echo "Down!"
	
#	fi

done


