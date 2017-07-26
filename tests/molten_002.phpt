--TEST--
Tracing PDO error exec
--SKIPIF--
<?php if (ini_get("molten.span_format") != "zipkin") print "skip"; ?>
--INI--
molten.enable=1
molten.tracing_cli=1
molten.sink_type=2
molten.output_type=2
molten.service_name=test
molten.sampling_rate_base=1
--FILE--
<?php
include 'config.inc';
include 'pdo_execute.inc';
exec_error($true_db);
exec_exception($true_db);
?>
--EXPECTF--

Warning: PDO::prepare() expects parameter 1 to be string, object given in %s on line 45

Fatal error: %s in %s
Stack trace:
#0 %s(62): PDO->exec('insert into con...')
#1 %s(5): exec_exception(Array)
#2 {main}
  thrown in %s on line 62
{"traceId":"%s","name":"PDO::query","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"select * from table_not_exist3","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"Table 'duobao.table_not_exist3' doesn't exist","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::exec","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"select * from table_not_exist","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"Table 'duobao.table_not_exist' doesn't exist","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::prepare","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"select * from table_not_exist2","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}}]}
{"traceId":"%s","name":"PDOStatement::execute","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"select * from table_not_exist2","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"Table 'duobao.table_not_exist2' doesn't exist","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::query","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"12121212","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '12121212' at line 1","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::exec","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"12121.1212","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '12121.1212' at line 1","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::prepare","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '12121.1212' at line 1","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"PDO::exec","version":"%s","id":"%s","parentId":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"cs","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"cr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"db.statement","value":"insert into configs(`key`, `value`)  values(1, 2)","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.type","value":"mysql","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"db.instance","value":"duobao","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"sa","value":"true","endpoint":{"serviceName":"mysql","ipv4":"%s","port":%d}},{"key":"error","value":"SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '1' for key 'PRIMARY'","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
{"traceId":"%s","name":"cli","version":"%s","id":"%s","timestamp":%d,"duration":%d,"annotations":[{"value":"sr","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}},{"value":"ss","timestamp":%d,"endpoint":{"serviceName":"test","ipv4":"%s"}}],"binaryAnnotations":[{"key":"path","value":"%s","endpoint":{"serviceName":"test","ipv4":"%s"}},{"key":"error","value":"%s","endpoint":{"serviceName":"test","ipv4":"%s"}}]}
