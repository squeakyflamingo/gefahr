/*********
  Code for a button which outputs its status to a webserver.
  Board used: Wemos Lolin 32
  All logic is reversed due to a n.c. switch.

  Code by Ivo and Tim.

  04.08.2020
*********/
#include "WiFi.h"
#include "ESPAsyncWebServer.h"

#define BUTTON_PIN 32
int buttonIsPressed = 0;

const char* ssid = "Quack!";
const char* password = "naknaknak";

AsyncWebServer server(80);

void setup() {
  pinMode(BUTTON_PIN, INPUT);
  Serial.begin(115200);
  Serial.println();


  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("Connected");
  Serial.println(WiFi.localIP());

  server.on("/", HTTP_GET, [](AsyncWebServerRequest *request) {
    AsyncWebServerResponse *response = request->beginResponse(200, "text/plain", String(buttonIsPressed).c_str());
    response->addHeader("Access-Control-Allow-Origin", "*");
    request->send(response);
  });
  server.begin();
}

void loop() {
  if (digitalRead(BUTTON_PIN) == LOW && buttonIsPressed == 0) {
    buttonIsPressed = 1;
    Serial.println("Button has been pressed");
  } else if(digitalRead(BUTTON_PIN) == HIGH && buttonIsPressed == 1) {
    buttonIsPressed = 0;
  }
  delay(1);
}
