import mysql.connector

mydb = mysql.connector.connect(
		  host="localhost",
		    user="root",
		      passwd="R&D$3rv3r",
		      database="nodedb"
		      )

#This enables us to use a single cursor for executing multiple queries inside the loop
mydb.autocommit=True

ack_nid_cursor= mydb.cursor()

#Extracting nid from tbl_ack
ack_nid_cursor.execute("SELECT nid FROM tbl_ack WHERE node_status=0")

ack_nid_result = ack_nid_cursor.fetchall() 

ack_nid_list=[]

#List of nid in nid_list
ack_nid_list = [row[0] for row in ack_nid_result]

print("Acknowledged nodes list")
print(ack_nid_list)

#Extracting the id from tbl_node whose online is greater than 0
node_id_cursor=mydb.cursor()


#tbl_node up listings
node_up_cur=mydb.cursor()

node_up_cur.execute("SELECT id FROM tbl_node WHERE online!=0")

node_up_result=node_up_cur.fetchall()

node_up_list=[row[0] for row in node_up_result]

print(node_up_list)
#tbl_nodes down listing
node_id_cursor.execute("SELECT id FROM tbl_node WHERE online=0")

node_id_result=node_id_cursor.fetchall()

node_id_list=[]

node_id_list=[row[0] for row in node_id_result]

print("Down nodes list")
print(node_id_list)

cursor1=mydb.cursor()
cursor2=mydb.cursor()

for number in node_up_list:  #down nodes from tbl_nodes
	for num in ack_nid_list: #ack_nodes in tbl_ack
		if num==number:
			#Making ack_status=1 so that it denotes the node has already been acknowledged
			cursor1.execute("UPDATE tbl_node set ack_status ={} where id ={}".format(1,num))
			#Making that very node's status in tbl_ack 1 so that it denotes it is up
			cursor2.execute("UPDATE tbl_ack set uptime=current_timestamp(),node_status = {} where nid ={}".format(1,num))
		
















