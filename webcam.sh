#!/bin/bash
# Logitech C270
# Nativ: 1280 x 720
# Resize: 720 x 394

SAVEPATH="/var/www/webcam" 
fswebcam -S 2 -r 1280x720 ${SAVEPATH}/archiv/$(date "+%s").jpg --scale 720x394 ${SAVEPATH}/live.jpg