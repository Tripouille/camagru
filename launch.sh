#!/bin/sh
docker build -t camagru_image .
docker run -v /Users/aalleman/camagru/site:/usr/share/webapps/site -d --name camagru_container -p 80:80 -p 443:443 camagru_image
docker exec -ti camagru_container /bin/sh