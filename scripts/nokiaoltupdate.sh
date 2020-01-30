#!/bin/bash
sed -i 's/,/ /g' newnokianode
server='localhost'
db='nodedb'
username='root'
password='R&D$3rv3r'
nodeindex='newnokianode'

while read id hostname snmpindex
do
#onlinemodem=`snmpwalk -v2c -c NETMAN $hostname ifOperStatus.$snmpindex | sed 's/.*INTEGER: //g'`
onlinemodem=`snmpwalk -v2c -c NETMAN $hostname ifOperStatus.94371840 | sed 's/.*INTEGER: //g'`

if [ $onlinemodem=="down(2)" ]
then
mysql -u $username -p$password $db<<EOF 
update tbl_node set online=0 where snmpIndex=$snmpindex and hid=$id;
EOF
else
mysql -u $username -p$password $db <<EOF
update tbl_node set online=1 where snmpIndex=$snmpindex and hid=$id;
EOF
fi
done <$nodeindex
