import os

fp=open("allnodes","r")

log=fp.readlines()

#To search the exact parameter in sed command

sed -n '/\b12\b/p' allnodes


for line in fp:
		print(line)
		#if()
		#os.system("ex +'%s/$/,1/g' -cwq {}".format(line))
	
		
		
fp.close()
