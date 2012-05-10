#!/bin/sh
#
# a script you can loop from Startup Applications that will
# exit when you log out of gnome, by gmargo, from http://goo.gl/Y639
# gconftool-2 will not run from cron in ubuntu 9.10 so rather than
# work around that, we can use a looping script instead of a cronjob.
# you can download/submit changes to this script: pastebin.org/147449
#                         and the partner script: pastebin.org/147450
#
while :
do
	# When gnome exits, our parent process becomes init,
	# but the PPID stays set.
	if ! ps -p $PPID > /dev/null
	then
		exit 0
	fi
	/home/chaos/bin/changebackground
	sleep 120
done
