#!/bin/bash

RESULT=`mysqlshow --user=root moci | grep -v Wildcard | grep -o moci`
if [ "$RESULT" != "moci" ]; then
    mysql -uroot < /tmp/moci.sql
	echo "Baza moci uspjesno kreirana"
fi
echo "Baza uspjesno konfigurisana"