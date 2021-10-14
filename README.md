# moji-ciljevi
Simple app for goals in life

## Kontejnerizovana verzija aplikacije. Koristen [ovaj](https://hub.docker.com/r/mattrayner/lamp#mysql-databases) image. 

### Izmjene su sljedece  
* Glavnina aplikacije premjestena u *app* folder radi lakseg volume mounting-a
* Napravljen mysql folder koji je bindan sa /var/lib/mysql folderom iz kontejnera
    * time smo omogucili da podaci u bazi ostanu spaseni i nakon gasenja kontejnera
* Kreiran *Dockerfile* koji pulla image, kopira dump i skriptu za inicijalizaciju baze te pokrece built-in skriptu za konfiguraciju svega sto kontejner nudi (*/run.sh*)  


# NAPOMENE
* docker build -t moci:latest .
* docker run -td -p 80:80 -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql moci:latest
* docker exec -it _ime kontejnera_ bash (po potrebi)

