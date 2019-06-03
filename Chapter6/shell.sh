#!/bin/bash
# USAGE:
# ./shell.sh https://www.apress.com/gp/web-development apress book pPriceGross fn isbn

# 1st PART
# store arguments in a special array
args=("$@");
# get number of elements
ELEMENTS=$#;

# connect to the URL indicated by the 2nd argument, argument $1 (the first, $0, is the script name)
# fill file.txt with ISBNs of the books
wget -q -O - $1 | \
grep '<h3><a href="/gp/book/'  | \
sed 's:.*<a href="/gp/book/::'  | \
awk -F'"' '{print $1}' > file.txt;

# 2nd PART
# get all book urls of a web page
for line in `cat file.txt`;
do 

echo -e "\n---------------------------\n";
a="https://www.apress.com/gp/book/";
b=$a$line;
echo $b;

# for the number of fields to be retrieved
for ((i=3;i<$ELEMENTS;i++)); do
output=$( \
wget -q -O - $b | \
grep -m 1 ${args[${i}]} | \
awk -F ":" '{print $2}' | \
sed 's/,//g' | \
sed 's/\"//g');
args2[${i}]=$output;
done 

mysql=${args[3]};
for ((i=3+1;i<$ELEMENTS;i++)); do
sql=${args[${i}]};
mysql="$mysql, $sql";
done
echo $mysql;

mysql2="'${args2[3]}'";
mysql2="$(echo $mysql2 | sed 's/ //')";
for ((i=3+1;i<$ELEMENTS;i++)); do
sql2=${args2[${i}]};
sql2="$(echo $sql2 | sed 's/ //')";
mysql2="$mysql2, '$sql2'";
done
echo -e "$mysql2\n";

sqlstring="INSERT INTO $3 ($mysql) VALUES($mysql2);";
mysql --user="root" --database="$2" -e "$sqlstring";
echo $sqlstring;

done

echo -e "\n---------------------------\n";
#rm -f file.txt;

