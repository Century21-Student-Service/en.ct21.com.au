#!/bin/bash

BASEDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

## build image
cd $BASEDIR/..
docker build . -t ct21 -f docker/Dockerfile

## start container if not
stopped=$(docker ps -a | grep ct21)
started=$(docker ps | grep ct21)
if [ -z "$started" ]; then
  if [ -z "$stopped" ]; then
    docker run -d --name ct21 \
      -p 8080:80 \
      -v ${PWD}:/app -v $BASEDIR/volumes/mysql:/etc/mysql -v $BASEDIR/volumes/lib-mysql:/var/lib/mysql \
      ct21
  else
    docker start ct21
  fi
fi