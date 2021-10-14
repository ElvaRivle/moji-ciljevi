# moji-ciljevi
Simple app for goals in life

## Kontejnerizovana verzija aplikacije. Koristen [ovaj](https://hub.docker.com/r/mattrayner/lamp#mysql-databases) image. 

### Izmjene su sljedece  
* Glavnina aplikacije premjestena u *app* folder radi lakseg volume mounting-a
* Napravljen mysql folder koji je bindan sa /var/lib/mysql folderom iz kontejnera
    * time smo omogucili da podaci u bazi ostanu spaseni i nakon gasenja kontejnera
* Kreiran *Dockerfile* koji pulla image, kopira dump i skriptu za inicijalizaciju baze te pokrece built-in skriptu za konfiguraciju svega sto kontejner nudi (*/run.sh*)  
~~* Ako se kontejner vrti prvi put, uci u kontejner i pokrenuti *initDB.sql* skriptu u */tmp* folderu
    * Zasto nisam napravio da se ova skripta sama od sebe izvrsava? Odlicno pitanje! Nisam mogao... 
        * 1. scenarij: napravio skriptu init koja poziva preko *source* skriptu */run.sh*. Problem je sto */run.sh* na samom kraju poziva *exec* komandu zbog koje se nikada nece vratiti u moju skriptu. A mora se vratiti da bi izvrsio inicijalizaciju baze kada se */run.sh* zavrsi (jer je izvrsenje te skripte preduslov da bi inic. baze bilo moguce - jer ta skripta instalira i pokrece mysql server).
        * 2. scenarij: Pozvao */run.sh* sa & (sutnuo ga u drugi proces) i dodao sleep u svoju skriptu od 20 sekundi da sacekam da se baza pokrene. Medjutim, skripta koja se pozove preko *CMD* iz *Dockerfile-a* ne smije prekinuti. Ako ona prekine, kontejner se gasi. */run.sh* se vrti bez problema zbog execa, a ja nisam zelio nikakve gluposti dodavati u skriptu tipa vrcenja neke beskonacne petlje ili tail /dev/null da mi se skripta nikada ne gasi. U prijevodu, nisam zelio praviti svoju skriptu da se vrti beskonacno, vec sam ostavio rjesenje autora image-a. 
    * All in all, rucno pokretati skriptu. Ako skontam neko elegantno rjesenje bice dodato~~  
    **(Uspjesno popravljeno!)**

# NAPOMENE
* docker build -t moci:latest .
* docker run -td -p 80:80 -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql moci:latest
* docker exec -it _ime kontejnera_ bash (po potrebi)

