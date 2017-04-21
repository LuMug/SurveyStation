WEBServer su Raspberry:

LAMP: Raspbian PIXEL, Apache 2.2, MySQL 5.5, PHP 5.6, +phpmyadmin

Arduino connesso tramite serial-USB, nota: alimentare esternamente


Script python legge la seriale e butta in MySQL
Arduino IDE installato anche su Raspberry (non necessario, ma comodo)
-----> !!!! Aprire il Serial Monitor sputtana i dati che arrivano al python

+-------------- Promemoria configurazione ------------------------------------
| creata immagine
| aggiunto file SSH
| boot
| adv ip scanner // aggiungere ip=xx::xx nel cmdline.txt
| putty con l'ip scanner
| /!\ fare un apt-get update e upgrade senza proxy
| raspi-config -> interface -> enable vnc
| installare vnc viewer
| ip in vnc viewer -> desktop visibile
| cambia risoluzione (tramite rasp-config o menu>pref>rasp pi config
| https://www.raspberrypi.org/learning/lamp-web-server-with-wordpress/ , https://www.raspberrypi.org/documentation/remote-access/vnc/README.md
| https://www.stewright.me/2012/09/tutorial-install-phpmyadmin-on-your-raspberry-pi/
| se caso per remoto sql -> bind addr 0.0.0.0 in my.cnf
+----------------------------------------------------------------------------



+-------------- Note --------------------------------------------------------
| Script database non funzionante (ho ricostruito il database copiando i blocchi singoli):
|	- dava qualche errore di sintassi sulla creazione procedure
|	- coerenza nei nomi (iniziali minuscole)
|		- p.es. drop surveyStation if exists;
|			create database surveystation;
|	- delimiter a capo e con spazio
|	- *nota: default now()/current_timestamp funziona solo da mysql 5.6.5 (messo default 0, poco importa la data è sempre settata)
|	+ per leggibilità: 
|		- pulire commenti inutili/superflui
|		- accorciare nomi
|
| Script Arduino ora semplificato, stampa semplicemente i valori sulla porta seriale (niente librerie esterne)
|	- Scheda Ethernet non più richiesta, qualunque Arduino va bene
|
| Script python semplice: farlo partire diverse volte finché si imbrocca il momento giusto
|	- *nota: assicurarsi che arduino sia sulla /dev/ttyACM0
|
| Files ib_log da rimuovere, non togliere ib_data, in seguito ricostruire il db (altrimenti -> table doesnt exists)
+----------------------------------------------------------------------------


+-------------- Da verificare / fare -----------------------------------------------
| /!\ Dopo un reboot la tabella sismografo è vuota, non so se è un comportamento voluto o se è una procedura sbagliata
| /!\ Cambiare tipo dei valori x,y,z in INT per risparmiare spazio (tanto sono sempre interi e se sono double si può moltiplicare e basta)
| Frequenza dati da accelerometro
| Ricezione dati per lungo tempo --> cancellazione dati
| Impostazione IP nel cmdline.txt (se non funziona bisogna fare IP scanner su tutta la rete)
| Settare proxy (non così evidente come sembra, potrebbe non essere possibile)
| Controllare se si dispone di un Arduino NANO, cosi da rendere più compatta la cosa
| Rendere il sito a scatola chiusa (specialmente se non si riesce a settare il proxy)
+----------------------------------------------------------------------------

