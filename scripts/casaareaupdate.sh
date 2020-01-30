#/bin/bash
sed -i 's/,/ /g' casanodeindex.txt
server='localhost'
db='nodedb'
username='root'
password='nayapai10'
nodeindex='casanodeindex.txt'
while read hid hostname snmpindex
 do
 onlinemodem=`snmpwalk -v2c -c incacmtsread $hostname 1.3.6.1.4.1.20858.10.12.1.1.1.2.$snmpindex | sed 's/.*Gauge32: //g'`
mysql -u $username -p$password $db <<EOF
update tbl_node set online=$onlinemodem where snmpIndex=$snmpindex and hid=$hid;
EOF
#echo "$hid        $hostname	$snmpindex       $onlinemodem"
done <$nodeindex

