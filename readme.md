# Jeux tirage Euromillions.


```
git clone https://github.com/alibelhaj/FDJ.git
# Lancer Docker
docker-compose up -d --build 
# Installer les dépendances
docker-compose exec php composer install
cd projets
npm install
# Encore
cd projets
./node_modules/.bin/encore dev
# lancer les tests unitaire

cd projects
vendor/bin/simple-phpunit
url : http://localhost:81/
