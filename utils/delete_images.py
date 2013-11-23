import md5
import os
import sys

path = sys.argv[1]

db_file = open(os.path.join(path,"pics_mysql.txt"),"w")
for file_name in os.listdir(path):
    if not file_name.lower().endswith(".gif"): continue
    db_file.write('DELETE FROM pics WHERE name="' + file_name + '";\n')

db_file.close()