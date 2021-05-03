# moji-ciljevi
Simple app for goals in life

My first project. Hopefully will improve it over time.  

More in README in future   

# Izvrsena potpuna refraktorizacija aplikacije u smislu bolje organizacije koda i malo bolje slijedjenje MVC-a, kao i baze podataka    
# Na grani stari-kod se nalazi prvobitna verzija aplikacije, cisto radi buduce nostalgije  
# Ima jos sitnica da se doradi, kod se negdje ponavlja, mozda malo JS... ali kad/ako se opet nakanim  
# Glavnina posla je zavrsena  


1st update [2.7.2019.]
----------------------------------------------------
Learned a lot by messing around with git, regex and DB design.  
POSIX regex are different from PCRE regex (PHP uses this one).  
Changed name from zig (ZIvot je IGra) to moji-ciljevi, because app won't have RPG elements like I intended.  
RPG like life simulator will be made (hopefully) after I get some more skills requiered.  

2nd update [5.7.2019.]
----------------------------------------------------
Learned that JS onlick default value of this is window, not actual caller element.  
To implement element who called, in function call pass this, and in function create one parameter.  
Column names in PDO should be used with ``, and values with ''.  
There exists method to put variables on HTML elements: datasets.  
Happily finished first official phase of project.  
  
  
## Treci update [22.7.2020.]  
KAKO OVO CUDO POSTAVITI DA RADI?????  
Potrebna MySQL baza moci, tu je dump baze  
Uz bazu potrebno je napraviti korisnika u MySQL sa username *moci* i sifrom *moci123*    
Cron fajl dodati negdje gdje se cron jobovi izvrsavaju  
U /etc/apache2/apache2.conf namjesiti za /var/www direktorij AllowOverride All, da se dozvoli izvrsavanje .htaccess-a  
takodjer, a2enmod rewrite i a2enmod headers  
Nakon toga, dodati *moci_sites_available.conf* u /etc/apache2/sites-available/moci.conf  
ukljuciti vhost sa a2ensite moci i restart apache-a  
i nakon toga pristupiti aplikaciji na http://www.moci.ba 
