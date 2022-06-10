#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <MFRC522.h>

#define WiFiSSID      "Tenda_D343D7"
#define WiFiPassword  "123456780"

#define DeviceToken "26452NOMi"

#define URLPath  "http://192.168.1.7/SmartAttendance/public/api/markAttendance"

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

WiFiClient wifiClient;
HTTPClient httpClient;

void setup()
{
  Serial.begin(9600);
  
  WiFi.begin(WiFiSSID, WiFiPassword);
  
  SPI.begin();
  mfrc522.PCD_Init();

  lcd.init();
  lcd.backlight();

  lcd.setCursor(2, 0);
  lcd.print("Numan Naseer");

  lcd.setCursor(2, 1);
  lcd.print("BC180402259");

  Serial.println("\nWiFi Connecting.");
  
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  
  Serial.println("\nWiFi Connected.");

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
    
    #define Parameters "?cardId="+String(rfidTagID)+"&deviceToken="+String(DeviceToken)
    String fullURL = URLPath Parameters;
//    Serial.println(fullURL);

//    HTTPClient http;
    httpClient.begin(wifiClient, fullURL);
    httpClient.addHeader("Content-Type", "application/json");
    int statusCode = httpClient.sendRequest("PUT", "");
    String payload = httpClient.getString();
    httpClient.end();
 
    Serial.println(statusCode);
    Serial.println(payload);

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
