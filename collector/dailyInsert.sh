#!/bin/bash
logDir=/var/log
logPath=$logDir/slaSshLoginLog
tmpPath=$logPath.tmp
mv -f $logPath $tmpPath
touch $logPath
php insertLogIntoDB.php $tmpPath >> $logDir/slaDailyInsert.log