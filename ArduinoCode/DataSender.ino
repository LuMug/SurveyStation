
#include <Client.h>
#include <SPI.h>
#include <Ethernet.h>
#include <MySQL_Cursor.h>
#include <Wire.h> 
#include <SFE_MMA8452Q.h>
#include <MySQL_Connection.h>

//istanza accellerometro
MMA8452Q accel;

//variabili per x,y,z del accelerometro
double X,Y,Z;

//mac address della scheda arduino
byte mac_addr[] = { 0x90, 0xA2, 0xDA, 0x10, 0x26, 0x5E };

// IP del server mysql
IPAddress server_addr(10,20,4,66);  
// utente mysql 
char user[] = "prova";    
// password utente mysql          
char password[] = "prova1234";       

// Query per inserire i dati x,y,z nel database
char INSERT_DATA[] = "INSERT INTO efof_samtinfoch43.sismografo (Valore_X, Valore_Y, Valore_Z) VALUES (%.5d, %.5d, %.5d)";
char query[128];

EthernetClient client;
MySQL_Connection conn((Client *)&client);

void setup() {
  Serial.begin(9600);    

  accel.init(SCALE_2G, ODR_50);
}

void loop() {
  printCalculatedAccels();
  
  // Initiate the query class instance
  MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
  while (!Serial); // wait for serial port to connect
  Ethernet.begin(mac_addr);
  Serial.println("Connecting...");
  Serial.println("Detect data...");

  //Connessione al database
  if (conn.connect(server_addr, 3306, user, password)) {
    while(true){
      //eseguo la query aggiungendo i valori da passare al database
      sprintf(query, INSERT_DATA, X, Y, Z);
      cur_mem->execute(query);  
    }   
  }
  else{
    Serial.println("Connection failed.");
    conn.close();
  }
}

//il metodo riceve i valori dall'accelerometro
void printCalculatedAccels()
{ 
  // Wait for new data
  if (accel.available())
  {
    //read accelerometer data
    accel.read();

    X = accel.x;
    Y = accel.y;
    Z = accel.z;
  }
}




