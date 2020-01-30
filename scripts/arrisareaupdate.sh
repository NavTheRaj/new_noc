#/bin/bash
sed -i 's/,/ /g' newarrisnode
server='localhost'
db='nodedb'
username='root'
password='R&D$3rv3r'
nodeindex='newarrisnode'
while read hid hostname snmpindex
 do
onlinemodem=`snmpwalk -v2c -c incacmtsread $hostname .1.3.6.1.4.1.4998.1.1.20.2.27.1.13.$snmpindex | sed 's/.*INTEGER: //g'`
mysql -u $username -p$password $db <<EOF
update tbl_node set online=$onlinemodem where snmpIndex=$snmpindex and hid=$hid;
EOF
done <$nodeindex

