#include <Wire.h> 
#include <SFE_MMA8452Q.h>
#include <Client.h>
#include <SPI.h>
#include <Ethernet.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>

//Mac Address Arduino
byte mac_addr[] = { 0x90, 0xA2, 0xDA, 0x10, 0x26, 0x5E };

//Server IP
IPAddress server_addr(10,20,4,126);  

// MySQL user login username
char user[] = "root";
// MySQL user login password
char password[] = "root";        

//Base Quary
char INSERT_DATA[] = "INSERT INTO efof_samtinfoch43.sismografo (Valore_X, Valore_Y, Valore_Z) VALUES (%d, %d, %d)";
char query[128];
MMA8452Q accel;
//Led
int led = 9;
EthernetClient client;
MySQL_Connection conn((Client *)&client);

void setup() {
  Serial.begin(9600);    
  pinMode(led, OUTPUT);
    accel.init(SCALE_2G, ODR_50);
}

void loop() {
    if (accel.available())
    {
      // Initiate the query class instance
      MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
      while (!Serial); // wait for serial port to connect
      Ethernet.begin(mac_addr);
      Serial.println("Connecting...");
      Serial.println("Detect data...");
      if (conn.connect(server_addr, 3306, user, password)) {
        while(true){
          accel.read();
                //Serial.print("X:");
    Serial.print(accel.x);
    Serial.print("\t");
    //Serial.print("Y:");
    Serial.print(accel.y);
    Serial.print("\t");
    //Serial.print("Z:");
    Serial.print(accel.z);
    Serial.print("\t");
          Serial.println(); // Print new line every time.
          sprintf(query, INSERT_DATA, accel.x, accel.y, accel.z); //Crea la QUERy da mandare al server
          // Execute the query
          cur_mem->execute(query);  
        }
      }
      else{
        Serial.println("Connection failed.");
        conn.close();
      }
   }else{
    Serial.println("Accelerometro non disponibile: Impossibile continuare.");
   }
}




