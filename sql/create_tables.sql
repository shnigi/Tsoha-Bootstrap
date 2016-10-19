CREATE TABLE appuser(
  username varchar(50) NOT NULL UNIQUE PRIMARY KEY,
  password varchar(50) NOT NULL,
  emailaddr varchar(200) NOT NULL,
  isadmin boolean,
  registerdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE stories(
  id SERIAL PRIMARY KEY,
  points INTEGER,
  story text NOT NULL,
  updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  createdby varchar(50) REFERENCES appuser(username)
);

CREATE TABLE comments(
  id SERIAL PRIMARY KEY,
  comment varchar(2000),
  updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  createdby varchar(50) REFERENCES appuser(username),
  story_id INTEGER REFERENCES stories(id)
);

CREATE TABLE categories(
  id SERIAL PRIMARY KEY,
  category varchar(200)
);

CREATE TABLE tarina_categories(
  tarinaid int REFERENCES stories(id) ON UPDATE CASCADE ON DELETE CASCADE,
  categories int REFERENCES categories(id) ON UPDATE CASCADE ON DELETE CASCADE
);
