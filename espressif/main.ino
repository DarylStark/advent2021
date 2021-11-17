#include <diot_wifi.h>
#include <Arduino.h>

class Application : diot::DIOT_WiFi
{
public:
    Application()
        : DIOT_WiFi("Advent2021", 1, 0, 0, "Main", 7, DEBUG)
    {
    }

    void setup()
    {
        _logger->debug("App", "Setting up");

        // Do the setup
        _setup();

        // Turn off the onboard LED
        _onboard_led.off();

        _logger->debug("App", "Done setting up");
    }

    void loop()
    {
        if (_loop())
        {
            Serial.println("Doing nothing");
        }
        delay(500);
    }
};

Application app;

void setup()
{
    app.setup();
}

void loop()
{
    app.loop();
}