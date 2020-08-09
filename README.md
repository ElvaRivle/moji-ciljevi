# moji-ciljevi
Simple app for goals in life

My first project. Hopefully will improve it over time.  

More in README in future   

# NA OVOJ GRANI JE APSOLUTNA REFRAKTORIZACIJA APLIKACIJE, OD BAZE PODATAKA DO SAMOG RADA PROTOKA PODATAKA  


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
Potrebna MySQL baza moci sa 2 tabele: users(id prim key auto inc i uname varchar) i goals (id prim key auto inc, uname varchar, type varchar, completed bool)  
tu je i dump baze, no sikiriki  
U /etc/apache2/*glavni_conf_fajl*.conf namjesiti za /var/www direktorij AllowOverride All, da se dozvoli izvrsavanje .htaccess-a  
takodjer, a2enmod rewrite i a2enmod headers, po zelji, ako se doda fajl u sites-avalaible, a2ensite 

