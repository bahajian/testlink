<?php
 /**
 * TestLink Open Source Project - http://testlink.sourceforge.net/
 * This script is distributed under the GNU General Public License 2 or later.
 *
 * Filename $RCSfile: clientCreateTestSuite.php,v $
 * @Author: francisco.mancardi@gmail.com
 *
 */
 
require_once 'util.php';
require_once 'sample.inc.php';

$method='createTestSuite';
$unitTestDescription = "";

$devKey = isset($_REQUEST['apiKey']) ? $_REQUEST['apiKey'] : $tlDevKey;

$args=array();
$args["devKey"] = $devKey;
$args["testprojectid"] = $env->tlProjectID;
$args["testsuitename"] = 'TS API 100';
$args["details"]='This has been created by XMLRPC API Call';

echo $unitTestDescription;
$client = new IXR_Client($server_url);
$client->debug = $tlDebug;
$ret = runTest($client,$method,$args,$tlIdx);


if( isset($ret[0]['id']) )
{
  $env->$tlIDName = $ret[0]['id'];
}
else
{
  $msg = 'Warning! ' . ' :: ' . $ret[0]['message'] . ' (file: ' . basename(__FILE__) . ")";
  throw new Exception($msg, 1);
}