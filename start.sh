#!/bin/bash
# This should be run inside a screen session

docker-compose down
docker-compose up --build -d

while [ : ]
do
    git fetch --all
    git reset --hard
    sleep 5
done