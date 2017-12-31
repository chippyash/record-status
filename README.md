# chippyash/RStatus

## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-blue.svg)
[![Build Status](https://travis-ci.org/chippyash/identity.svg)](https://travis-ci.org/chippyash/Identity)
[![Test Coverage](https://api.codeclimate.com/v1/badges/fc8854ae418eacd98d3d/test_coverage)](https://codeclimate.com/github/chippyash/identity/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/fc8854ae418eacd98d3d/maintainability)](https://codeclimate.com/github/chippyash/identity/maintainability)

See the [Test Contract](https://github.com/chippyash/record-status/blob/master/docs/Test-Contract.md)

## What?

Provides a simple helper capability for managing record or class status

## Why?

When dealing with database records, there is often a case for never deleting the record.
This can be because you either don't want to lose the data, or you need it in place
to ensure referential integrity with other data.

This small library provides the interfaces and traits to add a status functionality
to any class.
   
### Roadmap
   
If you want more, either suggest it, or better still, fork it and provide a pull request.

Check out [ZF4 Packages](http://zf4.biz/packages?utm_source=github&utm_medium=web&utm_campaign=blinks&utm_content=record-status) for more packages

## How

A record can be in one of three states:

- active. An active record can have be changed to suspended or defunct 
- suspended. A suspended record can be changed to active of defunct.  You should not 
change the attributes of a suspended reord.
- defunct. A [defunct](https://www.google.co.uk/search?q=dictionary+defunct&oq=dictionary+defunct&aqs=chrome..69i57j0.6782j1j7&sourceid=chrome&ie=UTF-8)
record or class cannot have its state changed.  This analogous to being deleted, except that the record
data remains intact. You must not change the attributes of a defunct record.

Whilst the library provides support to manage the record status, you should also bear
in mind that you will need to provide additional support to check the status in any
of your other methods in a class.

In the docs directory, you'll also find an example trigger that you can use in MySql 
or MariaDb database server to maintain status integrity.

### Coding Basics

#### Record Status Enum class

The `Chippyash\RStatus\RecordStatus` class is provided to provide the three possible
states as a an Enum(erator) using the [MyCLabs Enum](https://github.com/myclabs/php-enum) 
library.

<pre>
use Chippyash\RStatus\RecordStatus;

//create status objects
$status = RecordStatus::ACTIVE();
$status = RecordStatus::SUSPENDED();
$status = RecordStatus::DEFUNCT();

//test if status can be changed
if ($status->canChange()) {
	//....
}
</pre>

#### Enabling RecordStatus for your class

Have your class implement the RecordStatusRecordable interface.  Use the 
RecordStatusRecording trait as a convenient implementation of the interface.

<pre>
use Chippyash\RStatus\RecordStatusRecordable;
use Chippyash\RStatus\RecordStatusRecording;

class MyRecord implements RecordStatusRecordable
{
	use RecordStatusRecording;
}
</pre>

The RecordStatusRecording trait provides a protected `$recordStatus` propertyand the
following methods:

<pre>
/**
 * Return the record status
 *
 * @return RecordStatus
 */
public function getStatus();

/**
 * Set the record status
 *
 * @param RecordStatus $status
 *
 * @return $this
 *
 * @throws RecordStatusException
 */
public function setStatus(RecordStatus $status);

/**
 * Is record status == active
 *
 * @return bool
 */
public function isStatusActive();

/**
 * Is record status == suspended
 *
 * @return bool
 */
public function isStatusSuspended();

/**
 * Is record status == defunct
 *
 * @return bool
 */
public function isStatusDefunct();
</pre>

### Changing the library

1.  fork it
2.  write the test
3.  amend it
4.  do a pull request

Found a bug you can't figure out?

1.  fork it
2.  write the test
3.  do a pull request

NB. Make sure you rebase to HEAD before your pull request

Or - raise an issue ticket.

## Where?

The library is hosted at [Github](https://github.com/chippyash/record-status). It is
available at [Packagist.org](https://packagist.org/packages/chippyash/record-status)

### Installation

Install [Composer](https://getcomposer.org/)

#### For production

<pre>
    "chippyash/record-status": ">=1,<2"
</pre>

#### For development

Clone this repo, and then run Composer in local repo root to pull in dependencies

<pre>
    git clone git@github.com:chippyash/record-status.git
    cd record-status
    composer install
</pre>

To run the tests:

<pre>
    cd record-status
    vendor/bin/phpunit -c test/phpunit.xml test/
</pre>

## License

This software library is released under the [GNU GPL V3 or later license](http://www.gnu.org/copyleft/gpl.html)

This software library is Copyright (c) 2017, Ashley Kitson, UK

A commercial license is available for this software library, please contact the author. 
It is normally free to deserving causes, but gets you around the limitation of the GPL
license, which does not allow unrestricted inclusion of this code in commercial works.

## History

V1.0.0 Original release
