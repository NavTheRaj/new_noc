#/bin/bash
sed -i 's/,/ /g' /var/www/html/areacheck/scripts/motorolanodeindex.txt
server='localhost'
db='nodedb'
username='root'
password='nayapai10'
nodeindex='/var/www/html/areacheck/scripts/motorolanodeindex.txt'
while read hid hostname snmpindex
 do
onlinemodem=`snmpwalk -v2c -c incacmtsread $hostname 1.3.6.1.4.1.4981.2.1.2.1.7.$snmpindex | sed 's/.*INTEGER: //g'`
mysql -u $username -p$password $db <<EOF
update tbl_node set online=$onlinemodem where snmpIndex=$snmpindex and hid=$hid;
EOF
#echo "$hid        $hostname	$snmpindex       $onlinemodem"
done <$nodeindex

