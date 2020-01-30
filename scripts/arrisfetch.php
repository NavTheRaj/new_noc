<?php
$fp = fopen("arrisnodeindex.txt","w");
$db = new mysqli("localhost","root","nayapai10","nodedb");
if ($rs = $db->query("select tbl_host.id,tbl_host.hostname,tbl_node.snmpIndex from tbl_node JOIN tbl_host on tbl_host.id=tbl_node.hid where vendor='arris'"))
{
  while ($row = $rs->fetch_assoc())
  {
    fputcsv($fp, $row);
  }
  $rs->close();
}
fclose($fp);
