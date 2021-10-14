FROM mattrayner/lamp:latest-1804

# Your custom commands

COPY moci.sql /tmp/moci.sql
COPY initDB.sh /tmp/initDB.sh
COPY apache_conf/dir.conf /etc/apache2/mods-available/dir.conf
COPY apache_conf/apache2.conf /etc/apache2/apache2.conf

CMD ["/run.sh"]
#CMD ["/tmp/initDB.sh"]