Raspberry Pi Webcam
============

HOW TO USE IT
---------------

    apt-get install apache2 php5 fswebcam git
    mkdir /var/www/webcam && cd /var/www/webcam
    git clone https://github.com/sinky/raspberrypi-webcam.git

move webcam.sh somewhere and reate cronjob for it
    * 8-18 * * * /home/pi/webcam.sh
		

LICENSE
---------

Copyright 2013 Marco Krage

Released under the MIT and GPL Licenses.


