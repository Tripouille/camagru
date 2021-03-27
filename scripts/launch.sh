#!/bin/sh
docker build -t ci .
docker run -v /Users/jgambard/camagru/site:/usr/share/webapps/site -d --name cc -p 80:80 -p 443:443 ci
docker exec -ti cc sh