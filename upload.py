import argparse
import xlrd
import pymysql

#arg process
parser = argparse.ArgumentParser()
parser.add_argument("-f","--file",required=True)
args = parser.parse_args()

#db process
db = pymysql.connect(host='localhost',user='eun',password='Abcd23@#',db='multiple',charset='utf8')
cur = db.cursor()
cur.execute("SELECT max(aid) from soongsil_delivery")
value = cur.fetchall()
if value[0][0] is None:
	maxaid = 1;
else:
	maxaid = int(value[0][0]) + 1

#read excel
wb = xlrd.open_workbook(args.file)
ws = wb.sheet_by_index(0)

ncol = ws.ncols
nrow = ws.nrows

#input data in db
for i in range(1,nrow):
	sql = "insert into soongsil_delivery values(%s, %s, %s, %s, %s, %s, %s)"
	address = ws.cell(i,0).value.encode('utf-8') 
	item = ws.cell(i,1).value.encode('utf-8')
	phone = ws.cell(i,2).value.encode('utf-8') 
	cname = ws.cell(i,3).value.encode('utf-8')
	pay = int(ws.cell(i,4).value)
	allocate = ws.cell(i,5).value.encode('utf-8')
	cur.execute(sql,(maxaid,address,item,phone,cname,pay,allocate))
	maxaid += 1
	print(address)

#close db
db.commit()
db.close()
