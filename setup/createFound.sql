CREATE TABLE found (
	logDate DATE NOT NULL,
	logTime TIME NOT NULL,
	server VARCHAR(16) NOT NULL,
	sessionId INT NOT NULL,
	pubkeyType VARCHAR(3),
	pubkey VARCHAR(64),
	PRIMARY KEY (logDate, logTime, server, sessionId)
);
