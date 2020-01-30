import mysql.connector

mydb = mysql.connector.connect(
		  host="localhost",
		    user="root",
		      passwd="R&D$3rv3r",
		      database="nodedb"
		      )

mydb.autocommit=True
cur=mydb.cursor()


with open("downnodelist","r+") as fp:
	for line in fp:
		sql = "UPDATE tbl_node SET online = 0 WHERE hid = {}".format(line)
		cur.execute(sql)

		
		



