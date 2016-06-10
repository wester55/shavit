#!/bin/bash

GAWK=`which gawk`
if [ "x$GAWK" == "x" ]; then
	echo "please install gawk" && exit 1
fi

if [ "$#" -ne 2 ]; then
    echo "please provide row(1-4) and column(1-3) number" && exit 1
fi

our_path=`dirname $0`

if ! [[ $1 =~ ^[1-4]$ ]]; then echo "row number must be integer 1-4" && exit 1; fi 
if ! [[ $2 =~ ^[1-3]$ ]]; then echo "column number must be integer 1-3" &&  exit 1; fi

echo "printing cell[$1,$2] in csv file"
cat $our_path/file.csv | sed "$1q;d" | gawk -vFPAT='[^,]*|"[^"]*"' "{print \$$2}"
