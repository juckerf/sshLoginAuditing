# SSH Login Auditing
## Introduction
The purpose of this tool is, to collect ssh-logins over several Linux/Unix servers and show them in a nice web-gui.
So in case of some investigation it's easier to detect patterns also over multiple servers.
A further purpose is, to build an universal connector to some ssh-key-management tools, to resolve the used publickey at key-authentication to the correspondig human, organisation or whatever.

## Construct
This tool is built on three layers.
1. Syslog to collect all logins-logs on one single server and puts these collected logs into a database (using php pdo allows use to use nearly any sql database)
  1. Syslog clients and daemon
  2. Cronjob with bash- and php-script
2. A backend, which serves the data in json format for any HTTP-GET requests (REST-like)
  1. mysql server
  2. php script
3. A web frontend, which gets the data, shows them and allows us sorting and filtering the data
  1. jquery website
