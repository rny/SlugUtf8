# SlugUtf8

[![Build Status](https://travis-ci.org/rny/SlugUtf8.svg?branch=master)](https://travis-ci.org/rny/SlugUtf8)

SlugUtf8 is a simple library to generate friendly URL slug from a UTF-8 string. It keeps most of the UTF-8 charaters unchanged to better support Chinese/Japanese. 
SlugUtf8 is modified from https://gist.github.com/sgmurphy/3098978 

## Highlights

* Removes all special characters but keeps UTF-8 charaters unchanged.
* Support Chinese / Japanese.
* Dot between numbers is unchanged, e.g. 3.8.5
* Composer ready, PSR-4 compatible.
* PHPUnit tested.

## Install

Install `SlugUtf8` using Composer.

```
$ composer require rny/slugutf8
```

## Usage

```
use Rny\SlugUtf8\SlugUtf8;

$slug = SlugUtf8::SlugUtf8($str);
```

```
$slug = \Rny\SlugUtf8\SlugUtf8::SlugUtf8($str);
```

```
$options = array(
    'delimiter' => '-',
    'limit' => null,
    'lowercase' => true,
    'replacements' => array(),
    'transliterate' => false,
    'strip_non_utf8' => false,
);
$slug = \Rny\SlugUtf8\SlugUtf8::SlugUtf8($str, $options);
```

## Testing

```
$ composer test
```
