-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjä-taulun testidata
INSERT INTO appuser (username, password, emailaddr, isadmin, registerdate) VALUES ('superadmin', 's44t4n4', 'superadmin@vituttaako.com', TRUE, CURRENT_TIMESTAMP);
INSERT INTO appuser (username, password, emailaddr, isadmin, registerdate) VALUES ('testuser', 'testuser', 'testuser@gmail.com', FALSE, CURRENT_TIMESTAMP);

-- Tarinat taulun testidata
INSERT INTO stories (points, story, updated, createdby) VALUES (150, 'Kävin paskalla ja vessapaperi loppui! Ai että kun pistää vihaksi.', CURRENT_TIMESTAMP, 'testuser');
INSERT INTO stories (points, story, updated, createdby) VALUES (120, 'Olin juuri menossa bussiin, ensinnäkin matkakortista oli loppunut aika ja sen lisäksi lompakkoni levisi lattialle.', CURRENT_TIMESTAMP, 'testuser');

-- Kommentti taulun testidata
INSERT INTO comments (comment, updated, createdby, story_id) VALUES ('No älä valita. Mitäs et ostanut tarpeeksi paskapaperia!', CURRENT_TIMESTAMP, 'testuser', 1);
INSERT INTO comments (comment, updated, createdby, story_id) VALUES ('HAHA URPO!!!!', CURRENT_TIMESTAMP, 'testuser', 2);
