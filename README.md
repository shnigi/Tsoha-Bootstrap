
Yleisiä linkkejä:

* [Linkki sovellukseeni](http://ahni.users.cs.helsinki.fi/vmp)
* [Linkki dokumentaatiooni](https://github.com/shnigi/Tsoha-Bootstrap/blob/master/doc/dokumentaatio.pdf)
* [Linkki Tarinoiden selaamiseen] (http://ahni.users.cs.helsinki.fi/vmp/selaa)
* [Linkki Top10 listalle] (http://ahni.users.cs.helsinki.fi/vmp/topten)
* [Linkki Yksittäiseen Tarinaan, josta muokkaukset kommentteihin ja tarinaan tapahtuvat] http://ahni.users.cs.helsinki.fi/vmp/tarina/id


## Työn aihe

###Sovelluksen nimi: Vituttaako.
###Sovelluksen tarkoitus: Sovellus, jonne voi jakaa anonyymisti maailman pahuutta ja omaa huonoa oloa.
Sovellukseen voi kirjoittaa mikä tällä hetkellä eniten vituttaa.

## Idea
Sovellukseen voi kirjoittaa tekstiä joko anonyymisti tai rekisteröityneenä käyttäjänä. Rekisteröityneestä käyttäjästä ei kerätä muita tietoja kuin sähköposti ja käyttäjätunnus anonyymiyden vuoksi.
Rekisteröitynyt käyttäjä voi jatkossa myös muokata tai poistaa aiemmin lisäämäänsä tekstiä.
Anonyymisti kirjoitetut tekstit voi poistaa vain admin käyttäjä. Lisäksi jaettuja tekstejä voi kommentoida.
Admin käyttäjä voi hallita keskustelua joko poistamalla tai editoimalla julkaistuja tekstejä.
Myöhemmin mahdollisuutena liittää kuva aiheeseen.  

## Käynnistys / käyttöohje

Sovellukseen voi kirjautua testitunnuksilla:

Tunnus: testuser
Salasana: testuser

Sovellus asennetaan koulun palvelimelle ajamalla shellskriptit.

bootstrap.sh luo palvelimelle htaccess tiedoston, jossa url osoitteet laitetaan "oikeaan muotoon". Sitten annetaan tarvittavat oikeudet tiedostoille. Lopulta kopioidaan sovellus palvelimelle ja asennetaan se käyttäen composeria. 

<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons -lisenssi" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />Tämä teos on lisensoitu <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Nimeä 4.0 Kansainvälinen -lisenssillä</a>.
