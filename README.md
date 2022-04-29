## Requirements

* PHP 7.4
* Composer
* Symfony CLI
* NODEJS + yarn

## Launch develpment environment

composer install or composer update /
yarn install /
symfony server:start

## Add data tests / Fixtures / PHPFaker

symfony console doctrine:fixtures:load

symfony console doctrine:fixtures:load --env=test (test func)

symfony console doctrine:fixtures:load --no-interaction (Ignore questions)

## Tests unitaires

php bin/phpunit /
php bin/phpunit --testdox (more precision)

## Phpstan

composer run-script phpstan

## Check code quality

composer check-all (tests + phpstan)

## Php-cs-fixer / PSR

php-cs-fixer fix src --verbose --rules=@Symfony


