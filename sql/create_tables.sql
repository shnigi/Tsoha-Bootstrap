CREATE TABLE appuser(
  id SERIAL PRIMARY KEY,
  username varchar(50) NOT NULL FOREIGN KEY,
  password varchar(50) NOT NULL,
  registerdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE stories(
  id SERIAL PRIMARY KEY,
  points INTEGER,
  story varchar(5000) NOT NULL,
  updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  createdby varchar(50) REFERENCES appuser(username)
);

CREATE TABLE comments(
  id SERIAL PRIMARY KEY,
  comment varchar(2000),
  updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  createdby varchar(50) REFERENCES appuser(username)
);
