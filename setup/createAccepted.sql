CREATE TABLE accepted (
	logDate DATE NOT NULL,
	logTime TIME NOT NULL,
	server VARCHAR(16) NOT NULL,
	sessionId INT NOT NULL,
	loginType VARCHAR(32),
	user VARCHAR(32),
	sourceIp VARCHAR(16),
	PRIMARY KEY (logDate, logTime, server, sessionId)
);
