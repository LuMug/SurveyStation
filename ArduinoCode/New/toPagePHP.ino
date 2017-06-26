
/**
 * Classe toPagePHP
 * Classe che contatta una pagina PHP su un server e gli spedisce dei dati.
 */
#include <SPI.h>
#include <Ethernet.h>
#include <SparkFun_MMA8452Q.h>

/**
 * Pin per il notificatore multicolore
 */
int redPin = 5;
int greenPin = 6;
float x;
float y;
float z;

/**
 * Indirizzo MAC di Arduino
 */
byte mac[] = { 0x90, 0xA2, 0xDA, 0x10, 0x26, 0x5E };

/**
 * Indirizzo IP del server
 */
IPAddress server(10, 20, 4, 216); 
 
/**
 * Indirizzo IP di Arduino
 */
IPAddress ip(10, 20, 4, 105);

/**
 * Client
 */
EthernetClient client;
 
String strURL = "";

/**
 * Istanza di acceleromeetro
 */

MMA8452Q accel;

void setup(){
  Serial.begin(9600);

  /**
   * Metodo che setta all'accelerometro scala e frequenza
   */
  accel.init(SCALE_2G, ODR_400);

  
  if (Ethernet.begin(mac) == 0){
    Serial.println("Configurazione DHCP fallita!");
    Ethernet.begin(mac, ip);
  }else{
    Serial.println("Errore");
  }
  
  pinMode(redPin, OUTPUT);
  pinMode(greenPin, OUTPUT);

  accel.read();
  x = accel.cx;
  y = accel.cy;
  z = accel.cz;

  /*Serial.println(x);
  Serial.println(y);
  Serial.println(z);*/
  delay(100);
}
 
void loop(){
  /**
   * Aggiorno i valori
   */
  UpdateValues(); 
  while(client.available()){
    char c = client.read();
    Serial.print(c);
  }
 
  if (!client.connected()){
    Serial.println();
    Serial.println("Disconnesso.");
    client.stop();
  }else{
    Serial.println("Errore");
  }
  delay(100);
}
 
void UpdateValues(){
  Serial.println("Connessione...");

  /**
   * Connessione al server
   */
  if (client.connect(server, 80))
  {
    Serial.println("Connesso");

    /**
    * Controllo la disponi
    */
	  if(accel.available() == 1){
      /**
      * Notificatore fisico
      */
    
  

      accel.read();

      offSet();
      Serial.print("x: ");
      Serial.println(accel.cx, 3);
      Serial.print("y: ");
      Serial.println(accel.cy, 3);
      Serial.print("z: ");
      Serial.println(accel.cz, 3);
    /*if((x < accel.cx + 0.02 && x > accel.cx - 0.02) || (y < accel.cy + 0.05 && y > accel.cy - 0.05) || (z < accel.cz + 0.05 && z > accel.cz - 0.05)){
      inizialize();
      }
      /**
       * I range sono stati adattati alla posizione dell'accelerometro.
      */
      if((accel.cx < -0.008 || accel.cx > 0.008) || (accel.cy < -0.008 || accel.cy > 0.008) || (accel.cz < -0.008 || accel.cx > 0.008)){
        analogWrite(redPin, 255);
        analogWrite(greenPin, 0);
      }else{
        analogWrite(redPin, 0);
        analogWrite(greenPin, 255);
      }
   
      /**
      * Creazione dell'URL
      */
      strURL = "GET /index.php?x=";
      strURL += accel.cx;
      strURL += "&y=";
      strURL += accel.cy;
      strURL += "&z=";
      strURL += accel.cz;
      strURL += " HTTP/1.1";
      Serial.println(strURL);
      //invio la richiesta al server
      client.println(strURL);
      client.println("Host: 10.20.4.202");
      client.println("Connection: close");
      client.println();
      //chiudo la connessione
      client.stop();
    }else{
      Serial.println("Accelerometro non disponibile.");
    }
  }
  else{
    Serial.println("Errore Connessione");
  }
}

void offSet(){
    accel.cx = accel.cx-x;
    accel.cy = accel.cy-y;
    accel.cz = accel.cz-z;
}
