#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <MFRC522.h>

#define WiFiSSID      "Tenda_D343D7"
#define WiFiPassword  "123456780"

String pageURL = "http://192.168.1.6/rfidattendance/getdata.php"; //computer IP or the server domain

#define device_token "e38b0be586e50be9"

WiFiClient wifiClient;
HTTPClient httpClient;

#define lcdAddress  0x27
#define lcdColumns  16
#define lcdRows     2

LiquidCrystal_I2C lcd(lcdAddress, lcdColumns, lcdRows);

#define rfidRSTpin  D3
#define rfidSSpin   D4

MFRC522 mfrc522(rfidSSpin, rfidRSTpin);

byte readcard[4];
String  rfidTagID;

boolean getID();

void setup()
{
//  Serial.begin(9600);
  
  WiFi.begin(WiFiSSID, WiFiPassword);
  
  SPI.begin();
  mfrc522.PCD_Init();

  lcd.init();
  lcd.backlight();

  lcd.setCursor(2, 0);
  lcd.print("Numan Naseer");

  lcd.setCursor(2, 1);
  lcd.print("BC180402259");

//  Serial.println("\nWiFi Connecting.");
  
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  
//  Serial.println("\nWiFi Connected.");

//  delay(5000);

//  lcd.clear();

//  Serial.begin(9600);

  lcd.clear();
}

void loop()
{
  lcd.setCursor(0, 0);
  lcd.print("Smart Attendance");
  
  lcd.setCursor(1, 1);
  lcd.print("Scan RFID Card");

  if(getID())
  {
    lcd.clear();

//    lcd.setCursor(2, 0);
//    lcd.print("Place Wait");

    lcd.setCursor(0, 0);
    lcd.print("Smart Attendance");
    lcd.setCursor(0, 1);
    
    lcd.print("RFID: ");
    lcd.print(rfidTagID);

    String getData = "?card_uid=" + String(rfidTagID) + "&device_token=" + String(device_token); // Add the Card ID to the GET array in order to send it
    String URL = pageURL + getData;

    httpClient.begin(wifiClient, URL);
    httpClient.GET();
    String content = httpClient.getString();
    httpClient.end();
 
//    Serial.println(content);
//    delay(5000);

    delay(3000);
    lcd.clear();
  }
}

boolean getID()
{
  if(!mfrc522.PICC_IsNewCardPresent())
  {
    return false;
  }

  if(!mfrc522.PICC_ReadCardSerial())
  {
    return false;
  }

  rfidTagID = "";

  for(uint8_t i = 0; i < 4; i++)
  {
    rfidTagID.concat(String(mfrc522.uid.uidByte[i], HEX));
  }

  rfidTagID.toUpperCase();

  mfrc522.PICC_HaltA();
  return true;
}
