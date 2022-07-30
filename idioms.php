<?php

## idioms.php
## pffy/idioms for Chinese-Pinyin document indexing, implemented in PHP
## git: https://github.com/pffy/idioms-php
## lic: https://unlicense.org/

// returns pinyin with no spaces
function pmash($str) {
  return preg_replace('/[^[:alnum:]]/', '', strtolower($str));
}

// returns pinyin string with no numbers, and dashes replacing spaces
// NOTE: for ordered pinyin queries
function pdash($str) {

  // find-replace hat
  $arr = [
    '/\s/' => '-',
    '/\d/' => ''
  ];

  return preg_replace(array_keys($arr), array_values($arr), strtolower($str));
}

// returns pinyin string with no spaces, and no dashes
function pbash($str) {
  return preg_replace('/[^[:alpha:]]/', '', strtolower($str));
}

// returns pinyin string with pinyin initials only
function psmash($str) {
  $re = '/^(\w{1})|\s(\w{1})/';
  preg_match_all($re, $str, $arr);
  return join('', array_merge($arr[1], $arr[2]));
}

// returns pinyin string with pinyin initials, ordered by alpha
function pcrash($str) {
  $srr = str_split(psmash($str)); sort($arr);
  return join('', $qrr);
}

// returns pinyin string with unique letters, alpha only, ordered by alpha
function phash($str) {
  $arr = array_unique(str_split(pbash($str))); sort($arr);
  return join('', $arr);
}

// returns definition string with words separated by dashes
function dmash($str) {

  // find-replace map
  $arr = [
    '/\s/' => '-',
    '/\d/' => ''
  ];

  return str_replace(array_keys($arr), array_values($arr), strtolower($str));
}
