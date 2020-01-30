#/bin/bash
sed -i 's/,/ /g' nodeindex.txt
server='localhost'
db='nodedb'
username='root'
password='nayapai10'
echo "CMTS Name             Interface             Node Name       Online Modem"
echo "========================================================================"
nodeindex='nodeindex.txt'
while read id hostname snmpindex
do
 #nodename=`snmpwalk -v2c -c incacmtsread $hostname ifAlias.$snmpindex | sed -e 's/.*Areas=> //g'`
 #nodeinterface=`snmpwalk -v2c -c incacmtsread $hostname ifName.$snmpindex | sed -e 's/.*STRING: Ca//g'`
onlinemodem=`snmpwalk -v2c -c incacmtsread $hostname 1.3.6.1.4.1.9.9.116.1.4.1.1.5.$snmpindex | sed 's/.*INTEGER: //g'`
mysql -u $username -p$password $db <<EOF
update tbl_node set online=$onlinemodem where snmpIndex=$snmpindex and hid=$id;
EOF
done <$nodeindex

