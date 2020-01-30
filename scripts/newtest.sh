#/bin/bash
sed -i 's/,/ /g' newnokianode

db='nodedb'
server='localhost'
password='R&D$34v3r'
username='root'
nodeindex='newnokianode'
while read id hostname snmpindex
do
	echo $hostname
	echo $snmpindex
	
online='snmpwalk -v2c -c NETMAN '$hostname 'ifOperStatus.'$snmpindex
echo $online
done <$nodeindex
