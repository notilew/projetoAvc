#!/bin/bash

. /etc/bash.bashrc
umask 000
DIR="/u/chat_docker/apache/lhc_web/avanco/tickets/cron/"
LOG="$DIR/logs/invalida_tickets.log"

mkdir -p $DIR

date >> $LOG
cd $DIR
docker exec chat_avanco sh -c "cd /var/www/avanco/tickets/cron/ && /usr/bin/php invalida_tickets.php" >> $LOG
date >> $LOG

chmod -R 777 $DIR
chown -R www-data.www-data $DIR
