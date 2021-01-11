#!/bin/bash

. /etc/bash.bashrc
umask 000
DIR="/u/chat_docker/apache/lhc_web/avanco/dashboard/cron/"
LOG="$DIR/logs/atualiza_carteiras.log"

mkdir -p $DIR

date >> $LOG
cd $DIR
docker exec chat_avanco sh -c "cd /var/www/avanco/dashboard/cron/ && /usr/bin/php atualiza_carteiras.php" >> $LOG
date >> $LOG

chmod -R 777 $DIR
chown -R www-data.www-data $DIR
