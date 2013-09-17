import md5
import os
import sys

path = sys.argv[1]

db_file = open(os.path.join(path,"pics_mysql.txt"),"w")
for file_name in os.listdir(path):
    if not file_name.lower().endswith(".gif"): continue
    
    with open(os.path.join(path,file_name),"rb") as fp:
        contents = fp.read()
        
    new_file_name = md5.new(contents).hexdigest() + ".gif"
    
    print file_name + " --> " + new_file_name
    
    os.rename(os.path.join(path,file_name),os.path.join(path,new_file_name))
    
    db_file.write('INSERT INTO pics (name) VALUES ("' + new_file_name + '");\n')

db_file.close()