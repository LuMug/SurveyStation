#include <SPI.h>
#include <Ethernet.h>
 
byte mac[] = { 0x90, 0xA2, 0xDA, 0x10, 0x26, 0x5E };
//indirizzo server web (locale)
IPAddress server(10, 20, 4, 126); 
 
//indirizzo ip dell'Arduino
IPAddress ip(10, 20, 5, 35);
 
EthernetClient client;
 
String strURL = "";
float temp = 0;
 
void setup()
{
Serial.begin(9600);
 
if (Ethernet.begin(mac) == 0)
{
Serial.println("Configurazione DHCP fallita!");
Ethernet.begin(mac, ip);
}
 
delay(1000);
 
}
 
void loop()
{
UpdateTemp();
 
while(client.available())
{
char c = client.read();
Serial.print(c);
}
 
if (!client.connected())
{
Serial.println();
Serial.println("Disconnesso.");
client.stop();
}
 
//esegui la richiesta ogni 10 secondi
delay(1000);
}
 
void UpdateTemp()
{
Serial.println("Connessione...");
 
if (client.connect(server, 80))
{
Serial.println("Connesso");
//acquisisco il valore analogico dal sensore MCP9700
//vedi questo articolo
//www.logicaprogrammabile.it/mcp9700a-netduino-sensore-temperatura-analogico
temp = random(0, 100);
 
//creo l'url utilizzanso una stringa
strURL = "GET /index.php?valore=";
strURL += (int)temp;
strURL += " HTTP/1.1";
Serial.println(strURL);
//invio la richiesta al server
client.println(strURL);
client.println("Host: 10.20.4.126");
client.println("Connection: close");
client.println();
//chiudo la connessione
client.stop();
}
else
{
Serial.println("Errore Connessione");
}
}
