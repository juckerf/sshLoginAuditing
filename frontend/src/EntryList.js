"use strict";

function EntryList() {
  this.entries = [];
  this.sorted=false;
  this.sortField="";
}

EntryList.prototype.size = function() {
  return this.entries.length;
};

EntryList.prototype.createEntry = function(date, time, server, sessionId, loginType, user, sourceIp, pubkeyType, pubkey) {
  var _entry = new Entry(date, time, server, sessionId, loginType, user, sourceIp, pubkeyType, pubkey);
  this.entries.push(_entry);
  return _entry;
};

EntryList.prototype.render = function() {
  var $markup=$('<div class="entryTable">');
  var $head = $([' <div class="entryRow header">',
  	    '  <div class="entryCell" id="sortByDate">date</div>',
		'  <div class="entryCell" id="sortByTime">time</div>',
		'  <div class="entryCell" id="sortByServer">server</div>',
		'  <div class="entryCell" id="sortBySessionId">sessionId</div>',
		'  <div class="entryCell" id="sortByLoginType">loginType</div>',
		'  <div class="entryCell" id="sortByUser">user</div>',
		'  <div class="entryCell" id="sortBySourceIp">sourceIp</div>',
		'  <div class="entryCell" id="sortByPubkeyType">pubkeyType</div>',
		'  <div class="entryCell" id="sortByPubkey">pubkey</div>',
        ' </div>'].join('')).appendTo($markup);
  var _i;
  for (_i = 0; _i < this.entries.length; _i += 1) {
    $markup.append(this.entries[_i].render());
  }
  
  return $markup;
}

EntryList.prototype.toJSON = function() {
  return JSON.stringify({});
}

EntryList.prototype.sortBy = function(field, callback) {
	var _entryList = new EntryList();
	var _entries=this.entries;
	
	_entries=_.sortBy(this.entries,field);
	if(this.sorted&&this.sortField==field){
		_entries.reverse();
		this.sorted=false;
	} else {
		this.sorted=true;
	}
	_entryList.entries=_entries;
	this.sortField=field;
	callback(_entryList)
}

EntryList.prototype.filter = function(value, callback) {
	var _entryList = new EntryList();
	var _entries=this.entries;
	
	_entries=_.filter(this.entries,function(field){return field.toString().search(value)>=0;})
	_entryList.entries=_entries;
	callback(_entryList)
}

/*
 * Loads the given entrylist from the server.
 *
 * @param {string} id - unique identifier of the entrylist to load
 * @param {function} callback - method to call after the entrylist
 *   was successfully loaded. receives fully populated entrylist
 *   object as first and only parameter.
 */
EntryList.load = function(callback) {
  $.getJSON('http://localhost/frontend/entryList', function(data) {
    var _entryList = new EntryList()
    var _i;
    for (_i = 0; _i < data.entries.length; _i += 1) {
      var _entry = new Entry();
      _entry = _entryList.createEntry(data.entries[_i].date, data.entries[_i].time, data.entries[_i].server, data.entries[_i].sessionId, data.entries[_i].loginType, data.entries[_i].user, data.entries[_i].sourceIp, data.entries[_i].pubkeyType, data.entries[_i].pubkey);
    }
    callback(_entryList)
  });
}
