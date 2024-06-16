<?php
function addTXT($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_TXT) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL TXT $RR_TXT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_A) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL A $RR_A
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addAAAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_AAAA) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL AAAA $RR_AAAA
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addCNAME($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_CNAME) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL CNAME $RR_CNAME
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addMX($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_MX) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL MX $RR_PRIORITY $RR_MX
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addSRV($NS,$ZONE,$TSIG_PATH,$RR_SERVICE,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_WEIGHT,$RR_PORT,$RR_TARGET) {
$data = "<<EOF
server $NS
zone $ZONE
update add _$RR_SERVICE._$RR_PROTOCOL.$RR_NAME $RR_TTL SRV $RR_PRIORITY $RR_WEIGHT $RR_PORT $RR_TARGET
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addSSHFP($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_ALGORITHM,$RR_HASH,$RR_FINGERPRINT) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL SSHFP $RR_ALGORITHM $RR_HASH $RR_FINGERPRINT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addTLSA($NS,$ZONE,$TSIG_PATH,$RR_PORT,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_USAGE,$RR_SELECTOR,$RR_MATCHING,$RR_CERTINFO) {
$data = "<<EOF
server $NS
zone $ZONE
update add _$RR_PORT._$RR_PROTOCOL.$RR_NAME $RR_TTL TLSA $RR_USAGE $RR_SELECTOR $RR_MATCHING $RR_CERTINFO
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function addCAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_FLAGS,$RR_TAG,$RR_VALUE) {
$data = "<<EOF
server $NS
zone $ZONE
update add $RR_NAME $RR_TTL CAA $RR_FLAGS $RR_TAG $RR_VALUE
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
// โหมด ADD
if ($_POST['RR_MODE'] == "ADD") {
	switch ($_POST['RR_TYPE']) {
		case "TXT":
			$nsaddExecOutput = addTXT($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_TXT']);
			break;
		case "A":
			$nsaddExecOutput = addA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_A']);
			break;
		case "AAAA":
			$nsaddExecOutput = addAAAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_AAAA']);
			break;
		case "CNAME":
			$nsaddExecOutput = addCNAME($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_CNAME']);
			break;
		case "MX":
			$nsaddExecOutput = addMX($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_MX']);
			break;
		case "SRV":
			$nsaddExecOutput = addSRV($NS, $ZONE, $TSIG_PATH, $_POST['RR_SERVICE'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_WEIGHT'], $_POST['RR_PORT'], $_POST['RR_TARGET']);
			break;
		case "SSHFP":
			$nsaddExecOutput = addSSHFP($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_ALGORITHM'], $_POST['RR_HASH'], $_POST['RR_FINGERPRINT']);
			break;
		case "TLSA":
			$nsaddExecOutput = addTLSA($NS, $ZONE, $TSIG_PATH, $_POST['RR_PORT'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_USAGE'], $_POST['RR_SELECTOR'], $_POST['RR_MATCHING'], $_POST['RR_CERTINFO']);
			break;
		case "CAA":
			$nsaddExecOutput = addCAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_FLAGS'], $_POST['RR_TAG'], $_POST['RR_VALUE']);
			break;
	}
}

function deleteTXT($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_TXT) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL TXT $RR_TXT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_A) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL A $RR_A
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteAAAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_AAAA) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL AAAA $RR_AAAA
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteCNAME($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_CNAME) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL CNAME $RR_CNAME
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteMX($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_MX) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL MX $RR_PRIORITY $RR_MX
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteSRV($NS,$ZONE,$TSIG_PATH,$RR_SERVICE,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_WEIGHT,$RR_PORT,$RR_TARGET) {
$data = "<<EOF
server $NS
zone $ZONE
update delete _$RR_SERVICE._$RR_PROTOCOL.$RR_NAME $RR_TTL SRV $RR_PRIORITY $RR_WEIGHT $RR_PORT $RR_TARGET
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteSSHFP($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_ALGORITHM,$RR_HASH,$RR_FINGERPRINT) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL SSHFP $RR_ALGORITHM $RR_HASH $RR_FINGERPRINT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteTLSA($NS,$ZONE,$TSIG_PATH,$RR_PORT,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_USAGE,$RR_SELECTOR,$RR_MATCHING,$RR_CERTINFO) {
$data = "<<EOF
server $NS
zone $ZONE
update delete _$RR_PORT._$RR_PROTOCOL.$RR_NAME $RR_TTL TLSA $RR_USAGE $RR_SELECTOR $RR_MATCHING $RR_CERTINFO
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function deleteCAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_FLAGS,$RR_TAG,$RR_VALUE) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME $RR_TTL CAA $RR_FLAGS $RR_TAG $RR_VALUE
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
// โหมด DELETE
if ($_POST['RR_MODE'] == "DELETE") {
	switch ($_POST['RR_TYPE']) {
		case "TXT":
			$nsaddExecOutput = deleteTXT($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_TXT']);
			break;
		case "A":
			$nsaddExecOutput = deleteA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_A']);
			break;
		case "AAAA":
			$nsaddExecOutput = deleteAAAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_AAAA']);
			break;
		case "CNAME":
			$nsaddExecOutput = deleteCNAME($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_CNAME']);
			break;
		case "MX":
			$nsaddExecOutput = deleteMX($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_MX']);
			break;
		case "SRV":
			$nsaddExecOutput = deleteSRV($NS, $ZONE, $TSIG_PATH, $_POST['RR_SERVICE'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_WEIGHT'], $_POST['RR_PORT'], $_POST['RR_TARGET']);
			break;
		case "SSHFP":
			$nsaddExecOutput = deleteSSHFP($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_ALGORITHM'], $_POST['RR_HASH'], $_POST['RR_FINGERPRINT']);
			break;
		case "TLSA":
			$nsaddExecOutput = deleteTLSA($NS, $ZONE, $TSIG_PATH, $_POST['RR_PORT'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_USAGE'], $_POST['RR_SELECTOR'], $_POST['RR_MATCHING'], $_POST['RR_CERTINFO']);
			break;
		case "CAA":
			$nsaddExecOutput = deleteCAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_FLAGS'], $_POST['RR_TAG'], $_POST['RR_VALUE']);
			break;
	}
}


function updateTXT($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_TXT,$RR_NAME_OLD,$RR_TTL_OLD,$RR_TXT_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD TXT $RR_TXT_OLD
update add $RR_NAME $RR_TTL TXT $RR_TXT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_A,$RR_NAME_OLD,$RR_TTL_OLD,$RR_A_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD A $RR_A_OLD
update add $RR_NAME $RR_TTL A $RR_A
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateAAAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_AAAA,$RR_NAME_OLD,$RR_TTL_OLD,$RR_AAAA_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD AAAA $RR_AAAA_OLD
update add $RR_NAME $RR_TTL AAAA $RR_AAAA
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateCNAME($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_CNAME,$RR_NAME_OLD,$RR_TTL_OLD,$RR_CNAME_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD CNAME $RR_CNAME_OLD
update add $RR_NAME $RR_TTL CNAME $RR_CNAME
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateMX($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_MX,$RR_NAME_OLD,$RR_TTL_OLD,$RR_PRIORITY_OLD,$RR_MX_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD MX $RR_PRIORITY_OLD $RR_MX_OLD
update add $RR_NAME $RR_TTL MX $RR_PRIORITY $RR_MX
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateSRV($NS,$ZONE,$TSIG_PATH,$RR_SERVICE,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_PRIORITY,$RR_WEIGHT,$RR_PORT,$RR_TARGET,$RR_SERVICE_OLD,$RR_PROTOCOL_OLD,$RR_NAME_OLD,$RR_TTL_OLD,$RR_PRIORITY_OLD,$RR_WEIGHT_OLD,$RR_PORT_OLD,$RR_TARGET_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete _$RR_SERVICE_OLD._$RR_PROTOCOL_OLD.$RR_NAME_OLD $RR_TTL_OLD SRV $RR_PRIORITY_OLD $RR_WEIGHT_OLD $RR_PORT_OLD $RR_TARGET_OLD
update add _$RR_SERVICE._$RR_PROTOCOL.$RR_NAME $RR_TTL SRV $RR_PRIORITY $RR_WEIGHT $RR_PORT $RR_TARGET
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateSSHFP($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_ALGORITHM,$RR_HASH,$RR_FINGERPRINT,$RR_NAME_OLD,$RR_TTL_OLD,$RR_ALGORITHM_OLD,$RR_HASH_OLD,$RR_FINGERPRINT_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD SSHFP $RR_ALGORITHM_OLD $RR_HASH_OLD $RR_FINGERPRINT_OLD
update add $RR_NAME $RR_TTL SSHFP $RR_ALGORITHM $RR_HASH $RR_FINGERPRINT
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateTLSA($NS,$ZONE,$TSIG_PATH,$RR_PORT,$RR_PROTOCOL,$RR_NAME,$RR_TTL,$RR_USAGE,$RR_SELECTOR,$RR_MATCHING,$RR_CERTINFO,$RR_PORT_OLD,$RR_PROTOCOL_OLD,$RR_NAME_OLD,$RR_TTL_OLD,$RR_USAGE_OLD,$RR_SELECTOR_OLD,$RR_MATCHING_OLD,$RR_CERTINFO_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete _$RR_PORT_OLD._$RR_PROTOCOL_OLD.$RR_NAME_OLD $RR_TTL_OLD TLSA $RR_USAGE_OLD $RR_SELECTOR_OLD $RR_MATCHING_OLD $RR_CERTINFO_OLD
update add _$RR_PORT._$RR_PROTOCOL.$RR_NAME $RR_TTL TLSA $RR_USAGE $RR_SELECTOR $RR_MATCHING $RR_CERTINFO
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
function updateCAA($NS,$ZONE,$TSIG_PATH,$RR_NAME,$RR_TTL,$RR_FLAGS,$RR_TAG,$RR_VALUE,$RR_NAME_OLD,$RR_TTL_OLD,$RR_FLAGS_OLD,$RR_TAG_OLD,$RR_VALUE_OLD) {
$data = "<<EOF
server $NS
zone $ZONE
update delete $RR_NAME_OLD $RR_TTL_OLD CAA $RR_FLAGS_OLD $RR_TAG_OLD $RR_VALUE_OLD
update add $RR_NAME $RR_TTL CAA $RR_FLAGS $RR_TAG $RR_VALUE
send
EOF";
exec("$NSUPDATE_CMD $data", $nsaddDebugOutput, $nsaddExitCode);
return array($nsaddDebugOutput,$nsaddExitCode);
}
// โหมด UPDATE
if ($_POST['RR_MODE'] == "UPDATE") {
	switch ($_POST['RR_TYPE']) {
		case "TXT":
			$nsaddExecOutput = updateTXT($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_TXT'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_TXT_OLD']);
			break;
		case "A":
			$nsaddExecOutput = updateA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_A'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_A_OLD']);
			break;
		case "AAAA":
			$nsaddExecOutput = updateAAAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_AAAA'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_AAAA_OLD']);
			break;
		case "CNAME":
			$nsaddExecOutput = updateCNAME($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_CNAME'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_CNAME_OLD']);
			break;
		case "MX":
			$nsaddExecOutput = updateMX($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_MX'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_PRIORITY_OLD'], $_POST['RR_MX_OLD']);
			break;
		case "SRV":
			$nsaddExecOutput = updateSRV($NS, $ZONE, $TSIG_PATH, $_POST['RR_SERVICE'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_PRIORITY'], $_POST['RR_WEIGHT'], $_POST['RR_PORT'], $_POST['RR_TARGET'], $_POST['RR_SERVICE_OLD'], $_POST['RR_PROTOCOL_OLD'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_PRIORITY_OLD'], $_POST['RR_WEIGHT_OLD'], $_POST['RR_PORT_OLD'], $_POST['RR_TARGET_OLD']);
			break;
		case "SSHFP":
			$nsaddExecOutput = updateSSHFP($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_ALGORITHM'], $_POST['RR_HASH'], $_POST['RR_FINGERPRINT'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_ALGORITHM_OLD'], $_POST['RR_HASH_OLD'], $_POST['RR_FINGERPRINT_OLD']);
			break;
		case "TLSA":
			$nsaddExecOutput = updateTLSA($NS, $ZONE, $TSIG_PATH, $_POST['RR_PORT'], $_POST['RR_PROTOCOL'], $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_USAGE'], $_POST['RR_SELECTOR'], $_POST['RR_MATCHING'], $_POST['RR_CERTINFO'], $_POST['RR_PORT_OLD'], $_POST['RR_PROTOCOL_OLD'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_USAGE_OLD'], $_POST['RR_SELECTOR_OLD'], $_POST['RR_MATCHING_OLD'], $_POST['RR_CERTINFO_OLD']);
			break;
		case "CAA":
			$nsaddExecOutput = updateCAA($NS, $ZONE, $TSIG_PATH, $_POST['RR_NAME'], $_POST['RR_TTL'], $_POST['RR_FLAGS'], $_POST['RR_TAG'], $_POST['RR_VALUE'], $_POST['RR_NAME_OLD'], $_POST['RR_TTL_OLD'], $_POST['RR_FLAGS_OLD'], $_POST['RR_TAG_OLD'], $_POST['RR_VALUE_OLD']);
			break;
	}
}
?>
