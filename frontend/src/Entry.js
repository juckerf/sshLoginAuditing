"use strict";

function Entry(date, time, server, sessionId, loginType, user, sourceIp, pubkeyType, pubkey) {
  	this.date=date;
	this.time=time;
	this.server=server;
	this.sessionId=sessionId;
	this.loginType=loginType;
	this.user=user;
	this.sourceIp=sourceIp;
	this.pubkeyType=pubkeyType || "";
	this.pubkey=pubkey || "";
}

Entry.prototype.render = function() {  
    var _date=this.date;
	var _time=this.time;
	var _server=this.server;
	var _sessionId=this.sessionId;
	var _loginType=this.loginType;
	var _user=this.user;
	var _sourceIp=this.sourceIp;
	var _pubkeyType=this.pubkeyType;
	var _pubkey=this.pubkey;
  
	var $markup = $(['<div class="entryRow">',
		'  <div class="entryCell">'+_date+'</div>',
		'  <div class="entryCell">'+_time+'</div>',
		'  <div class="entryCell">'+_server+'</div>',
		'  <div class="entryCell">'+_sessionId+'</div>',
		'  <div class="entryCell">'+_loginType+'</div>',
		'  <div class="entryCell">'+_user+'</div>',
		'  <div class="entryCell">'+_sourceIp+'</div>',
		'  <div class="entryCell">'+_pubkeyType+'</div>',
		'  <div class="entryCell">'+_pubkey+'</div>',
		'</div>'].join(" "));
	return $markup;
};

Entry.prototype.toString = function() {
	return this.date+";"+this.time+";"+";"+this.server+";"+";"+this.sessionId+";"+";"+this.loginType+";"+";"+this.user+";"+";"+this.sourceIp+";"+";"+this.pubkeyType+";"+";"+this.pubkey;
}