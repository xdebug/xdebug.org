#!/bin/sh

rm files/docs.tar.gz
for i in docs*; do
	j=`echo $i | sed 's/.php/.txt/'`
	lynx -dump -nolist http://xdebug/$i > /tmp/$j
	echo $i
done
tar -cvzf files/docs.tar.gz /tmp/docs*.txt
