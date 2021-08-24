//rfid include
#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN D4
#define RST_PIN D2
//wifi include
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>

//wifi
const char* ssid     = "Baby";
const char* password = "baby1437";
ESP8266WebServer server(80);
WiFiClient client;
MDNSResponder mdns; //multicast Domain Name System

//rfid
MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class
 String no_rfid ="";


void setup() {
  
   Serial.begin(115200);
   
  delay(1000);
 Serial.println("Hii ");
  // Connect to WiFi network
  WiFi.begin(ssid, password);
  Serial.print("\n\r \n\rWorking to connect");
 
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  if (mdns.begin("esp8266", WiFi.localIP())) {
    Serial.println("MDNS responder started");
  }


   SPI.begin();       // Init SPI bus
   mfrc522.PCD_Init(); // Init MFRC522
   Serial.println("RFID reading UID");
    
}

void loop() {
   
if ( mfrc522.PICC_IsNewCardPresent())
    {
        if ( mfrc522.PICC_ReadCardSerial())
        {
           Serial.print("Tag UID:");
           for (byte i = 0; i < mfrc522.uid.size; i++) {
                  Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                //Serial.print(mfrc522.uid.uidByte[i], HEX);
                
                 no_rfid = mfrc522.uid.uidByte[i];
                 
           }
                 Serial.print(no_rfid);
  //f = f+1 ;
       server.handleClient();
    //if ( f <3 ){Serial.println("\nStarting connection to server..."); }
 
 if (client.connect("192.168.43.177", 80)) {
//        if ( f <3 ){Serial.println("connected to server");}
    client.print("GET /write_data.php?"); // This
    client.print("value="); // This
    client.print(no_rfid); // And this is what we did in the testing section above. We are making a GET request just like we would from our browser but now with live data from the sensor
    client.println(" HTTP/1.1"); // Part of the GET request
    client.println("Host: 127.0.0.1"); // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here 
    client.println("Connection: close"); // Part of the GET request telling the server that we are over transmitting the message
    client.println(); // Empty line
    client.println(); // Empty line
    client.stop();    // Closing connection to server
    }
    else {
    // If Arduino can't connect to the server (your computer or web page)
    Serial.println("--> connection failed\n");
  }
                 
            Serial.println();
            mfrc522.PICC_HaltA();
        }
}
}
