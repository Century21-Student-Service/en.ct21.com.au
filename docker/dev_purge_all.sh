#!/bin/bash

BASEDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

docker rm -f ct21
docker image rm ct21
rm -rf $BASEDIR/../docker/volumes/*