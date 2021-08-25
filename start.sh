docker-compose down
docker-compose up --build -d

while [ : ]
do
    git pull
done