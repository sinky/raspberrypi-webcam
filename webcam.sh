#!/bin/bash
# Aufloesungen Logitech C270
# 1280 x 720 // 800 x 438 // 720 x 394
SAVEPATH="/var/www/webcam"
TIMESTAMP="$(date "+%s")"

#Save live image and archiv
fswebcam -v --title "my-azur.de" --timestamp "%Y-%m-%d %H:%M:%S (%Z)" -S 2 -r 1280x720 ${SAVEPATH}/archiv/${TIMESTAMP}.jpg --scale 720x394 ${SAVEPATH}/live_pre.jpg

#copy pre live image to real live image
cp ${SAVEPATH}/live_pre.jpg ${SAVEPATH}/live.jpg

#set rights
sudo chown www-data.users ${SAVEPATH}/archiv/${TIMESTAMP}.jpg
sudo chmod 774 ${SAVEPATH}/archiv/${TIMESTAMP}.jpg

#delete old archiv images
(ls -t ${SAVEPATH}/archiv/*.jpg |head -n 14400;ls ${SAVEPATH}/archiv/*.jpg)|sort|uniq -u|xargs rm
