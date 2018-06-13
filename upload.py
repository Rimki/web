import argparse
import xlrd

parser = argparse.ArgumentParser()
parser.add_argument("-f","--file",required=True)
args = parser.parse_args()

wb = xlrd.open_workbook(args.file)
ws = wb.sheet_by_index(0)

ncol = ws.ncols
nrow = ws.nrows

for i in range(1,nrow):
	for j in range(0,ncol):
		try:
			print(ws.cell(i,j).value.encode('utf-8'))
		except:
			print(int(ws.cell(i,j).value))

