"use strict";

var entryList;

$(function() {
  entryList = new EntryList();
  EntryList.load(function(el) {
      entryList = el;
      $('#entryList').html(entryList.render());
	  uiFunctions();
  });


  $('#createEntry').click(function(event) {
    event.preventDefault();
    var entry = entryList.createEntry('');
    $('#entryList').append(entry.render());
  });

});

function uiFunctions(){
  $('#sortByDate').click(function(event) {
    entryList.sortBy("date",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByTime').click(function(event) {
	console.log("test");
    entryList.sortBy("time",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByServer').click(function(event) {
    entryList.sortBy("server",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortBySessionId').click(function(event) {
    entryList.sortBy("sessinoId",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByLoginType').click(function(event) {
    entryList.sortBy("loginType",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByUser').click(function(event) {
    entryList.sortBy("user",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortBySourceIp').click(function(event) {
    entryList.sortBy("sourceIp",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByPubkeyType').click(function(event) {
    entryList.sortBy("pubkeyType",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#sortByPubkey').click(function(event) {
    entryList.sortBy("pubkey",function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#filter').click(function(event) {
    entryList.filter($("#filterText")[0].value,function(tEntryList){$('#entryList').empty().html(tEntryList.render());uiFunctions();});
  });
  $('#reset').click(function(event) {
    $('#entryList').empty().html(entryList.render());
	entryList.uiFunctions();
  });
}