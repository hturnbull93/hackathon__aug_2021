#!/bin/bash
# This should be run inside a screen session

docker-compose down
docker-compose up --build -d

while [ : ]
do
    git pull --rebase --autostash
    sleep 5
done