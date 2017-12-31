#!/bin/bash
cd ~/Projects/chippyash/source/record-status/
vendor/phpunit/phpunit/phpunit -c test/phpunit.xml --testdox-html contract.html test/
tdconv -t "Chippyash Record Status" contract.html docs/Test-Contract.md
rm contract.html

