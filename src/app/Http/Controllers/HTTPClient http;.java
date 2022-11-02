HTTPClient http;

      String serverPathOxy = "127.0.0.1/aerator/public/notif-oxy";
      String serverPathKeruh = "127.0.0.1/aerator/public/notif-keruh";
      String serverPathPh = "127.0.0.1/aerator/public/notif-ph";
      String serverPathTemp = "127.0.0.1/aerator/public/notif-temp";
      
      // Your Domain name with URL path or IP address with path
      http.begin(serverPathOxy.c_str());
      http.begin(serverPathKeruh.c_str());
      http.begin(serverPathPh.c_str());
      http.begin(serverPathTemp.c_str());
      
      // Send HTTP GET request
      int httpResponseCode = http.GET();
      
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println(payload);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }