test:
	@vendor/bin/phpunit

clean:
	@rm -rf artifacts/*

package:
	@php build/packager.php

bootstrap:
	@php composer.phar update

example:
	@(cd ./example && php -S localhost:8000)

.PHONY: test start-server stop-server package example
