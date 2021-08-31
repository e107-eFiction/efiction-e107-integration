<?php
 
function dbquery($query) {
    return e107::getDb()->gen($query); 
}

function dbnumrows($query) {
 return e107::getDb()->rowCount($query);
 /* or if it fails  
  $tmp = e107::getDb()->retrieve($query, true);
  return count($tmp);
  */
}

function dbassoc($sql) {
  return e107::getDb()->fetch("assoc");
}

function dbinsertid($tablename = 0) {
 /* $this->lastInsertId() works only with insert(); not gen(), probably manual fix is needed */
 return e107::getDb()->lastInsertId();
}

function dbrow($sql) {
  return e107::getDb()->fetch('num') ; 
}

function dbclose() {
 /* it is done by db handler automatically, just not have this fails */
 e107::getDb()->close();
}

// Used to escape text being put into the database.
function escapestring($str) {

if (!is_array($str)) return e107::getDb()->escape($str);
   return array_map('escapestring', $str);
}
 