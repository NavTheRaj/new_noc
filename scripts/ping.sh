#!/bin/bash
sed -i 's/,/ /g' ~/hostlist

#First lets empty the existing downnodelist and upnodelist to prevent overwriting
upnode=upnodelist
downnode=downnodelist

nodeindex="hostlist"
while read id hostname
do
    echo $hostname
#    ping -c 3 "$hostname">/dev/null
#It means the node is up
 #   if [ $? -eq 0 ]; then
  #     echo $id > upnodelist
   #It means the node is down
   # else
    #    echo $id > downnodelist
   # fi
done >$nodeindex

