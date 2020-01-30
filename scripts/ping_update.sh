#!/bin/bash

sed -i 's/,/ /g' hostlist.txt
cat hostlist.txt | while read id hostname;
do
	
	fping $hostname >/dev/null
	
	if [ $? -eq 0 ]; then 
		awk '$1==$id{$5="1";}1' allnodes >>testfile.tmp && mv testfile.tmp allnodes
	else
		awk '$1==$id{$5="0";}1' allnodes >>testfile.tmp && mv testfile.tmp allnodes
	fi

done
