test:
	@vendor/bin/phpunit

clean:
	@rm -rf artifacts/*

package:
	@php build/packager.php

bootstrap:
	@php composer.phar update

.PHONY: test start-server stop-server package
