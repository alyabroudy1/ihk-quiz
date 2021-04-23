SYMFONY_ENV=dev
PHP_CMD=php
SYMFONY_CMD=$(PHP_CMD) bin/console
PHPUNIT=$(PHP_CMD) bin/phpunit
VENDOR_BIN=vendor/bin/

JWT_PRIVATE_PW=JWT_RSA_PASSPHRASE_12345678_CHANGEME
JWT_FOLDER=config/jwt/

init:
	$(SYMFONY_CMD) doc:database:create --if-not-exists -vv && \
	$(SYMFONY_CMD) do:mi:mi --allow-no-migration -n -vv
	$(SYMFONY_CMD) doc:fixtures:load --no-interaction --env=dev --group=app --group=stage

jwt:
	mkdir config/jwt -p && \
	openssl genrsa -passout pass:$(JWT_PRIVATE_PW) -out $(JWT_FOLDER)private.pem -aes256 4096  && \
	openssl rsa -pubout -in $(JWT_FOLDER)private.pem -passin pass:$(JWT_PRIVATE_PW) -out $(JWT_FOLDER)public.pem

res:
	$(SYMFONY_CMD) doctrine:database:drop --force --env=dev
	$(SYMFONY_CMD) doc:database:create --if-not-exists -vv  --env=dev && \
	$(SYMFONY_CMD) do:mi:mi --allow-no-migration -n -vv --env=dev
	$(SYMFONY_CMD) doc:fixtures:load --no-interaction --env=dev