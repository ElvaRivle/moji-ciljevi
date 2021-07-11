FROM mattrayner/lamp:latest-1804

# Your custom commands

COPY moci.sql /tmp/moci.sql
COPY initDB.sh /tmp/initDB.sh


CMD ["/run.sh"]
#CMD ["/tmp/initDB.sh"]