#!/bin/sh
docker build -t ci .
docker run -v C:\Users\jean-\Documents\42\camagru\site:/usr/share/webapps/site -d --name cc -p 80:80 -p 443:443 ci