
#include <Wire.h>


void setup() {
  // put your setup code here, to run once:
  Wire.begin();
  Serial.begin(9600); 
}

int reading = 0;
byte b = 0;

void loop() {
  // put your main code here, to run repeatedly:
  Wire.beginTransmission(0x1D); // transmit to device #112 (0x70)
  b = Wire.requestFrom(0x1D, 2);
  Serial.print("Bytes: ");
  Serial.println(b);
  if (2 <= Wire.available()) { // if two bytes were received
    reading = Wire.read();  // receive high byte (overwrites previous reading)
    reading = reading << 8;    // shift high byte to be high 8 bits
    reading |= Wire.read(); // receive low byte as lower 8 bits
    
    Serial.print("Read: ");   // print the reading*/
    Serial.println(reading);
  }

 
  delay(1000);     

}
