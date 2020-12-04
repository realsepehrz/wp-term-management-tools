Note that although this file lives in `tests/` these command should be run in the plugin root folder.

# Test Setup
`bin/install-wp-tests.sh wordpress_test root mdixie localhost latest`
Note that your db username and password will probably be different, so adjust accordingly.
 
# Running Tests
## Normal tests
`phpunit --coverage-html tests/reports --testsuite Unit`

## WPML tests
To test WPML, you'll need a copy of the WPML plugins in the right spots. 
 `phpunit --coverage-html tests/reports --testsuite WPML --bootstrap tests/bootstrap-WPML.php`